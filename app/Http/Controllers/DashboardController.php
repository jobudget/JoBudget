<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Saving;
use App\Models\FinancialGoal;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();


        /*
        |--------------------------------------------------------------------------
        | TOTAL INCOME
        |--------------------------------------------------------------------------
        */

        $totalIncome = Income::where('user_id', $userId)
            ->whereBetween('income_date', [
                $startOfMonth,
                $endOfMonth
            ])
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | TOTAL EXPENSES
        |--------------------------------------------------------------------------
        */

        $totalExpenses = Expense::where('user_id', $userId)
            ->whereBetween('expense_date', [
                $startOfMonth,
                $endOfMonth
            ])
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | TOTAL SAVINGS
        |--------------------------------------------------------------------------
        */

        $totalSavings = Saving::where('user_id', $userId)
            ->whereBetween('saving_date', [
                $startOfMonth->toDateString(),
                $endOfMonth->toDateString()
            ])
            ->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | REMAINING BALANCE
        |--------------------------------------------------------------------------
        |
        | Remaining Balance =
        | Total Income - Total Expenses - Total Savings
        |
        |--------------------------------------------------------------------------
        */

        $balance =
            $totalIncome
            - $totalExpenses
            - $totalSavings;


        /*
        |--------------------------------------------------------------------------
        | EXPENSE PIE CHART
        |--------------------------------------------------------------------------
        */

        $categories = [
            'Bills',
            'Rent',
            'Miscellaneous'
        ];

        $expenses = Expense::with('category')
            ->where('user_id', $userId)
            ->whereBetween('expense_date', [
                $startOfMonth,
                $endOfMonth
            ])
            ->get();

        $groupedExpenses = $expenses
            ->groupBy(function ($expense) {
                return $expense->category?->name;
            })
            ->map(function ($items) {
                return $items->sum('amount');
            });

        $expenseChart = [
            'labels' => $categories,

            'data' => array_map(
                function ($category) use ($groupedExpenses) {
                    return (float) (
                        $groupedExpenses[$category] ?? 0
                    );
                },
                $categories
            )
        ];


        /*
        |--------------------------------------------------------------------------
        | MONTHLY EXPENSE BAR GRAPH
        |--------------------------------------------------------------------------
        */

        $monthlyExpenses = Expense::where('user_id', $userId)
    ->orderBy('expense_date')
    ->get(['expense_date', 'amount'])
    ->groupBy(function ($expense) {
        return Carbon::parse($expense->expense_date)->format('Y-m');
    })
    ->map(function ($items) {
        return $items->sum('amount');
    });

$monthlyExpenseChart = [
    'labels' => $monthlyExpenses
        ->keys()
        ->map(function ($month) {
            return Carbon::createFromFormat('Y-m', $month)
                ->format('M Y');
        })
        ->values()
        ->toArray(),

    'data' => $monthlyExpenses
        ->values()
        ->map(function ($total) {
            return (float) $total;
        })
        ->values()
        ->toArray()
];


        /*
        |--------------------------------------------------------------------------
        | NEXT PAYDAY
        |--------------------------------------------------------------------------
        */

        $today = Carbon::today();

        $paydayThisMonth10 = $today->copy()->day(10);
        $paydayThisMonth25 = $today->copy()->day(25);

        if ($today->lt($paydayThisMonth10)) {

            $nextPayday = $paydayThisMonth10;

        } elseif ($today->lt($paydayThisMonth25)) {

            $nextPayday = $paydayThisMonth25;

        } else {

            $nextPayday = $today
                ->copy()
                ->addMonthNoOverflow()
                ->day(10);
        }

        $daysUntilPayday = $today->diffInDays($nextPayday);


        /*
        |--------------------------------------------------------------------------
        | FINANCIAL GOALS
        |--------------------------------------------------------------------------
        |
        | Get only the goals belonging to the currently logged-in user.
        |
        |--------------------------------------------------------------------------
        */

        $goals = FinancialGoal::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | SEND DATA TO DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('dashboard', compact(
            'totalIncome',
            'totalExpenses',
            'totalSavings',
            'balance',
            'expenseChart',
            'monthlyExpenseChart',
            'daysUntilPayday',
            'nextPayday',
            'goals'
        ));
    }
}