<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    
public function index()
{
    $userId = auth()->id();

    // Automatically create the required categories
    $defaultCategories = [
        'Bills',
        'Rent',
        'Miscellaneous',
    ];

    foreach ($defaultCategories as $name) {
        ExpenseCategory::firstOrCreate([
            'user_id' => $userId,
            'name' => $name,
        ]);
    }

    $categories = ExpenseCategory::where('user_id', $userId)
        ->orderBy('name')
        ->get();

    $expenses = Expense::where('user_id', $userId)
        ->with('category')
        ->orderByDesc('expense_date')
        ->get();

    // Total expenses
    $totalExpenses = $expenses->sum('amount');

    // Expenses deducted from monthly income
    $incomeExpenses = $expenses
        ->where('deduct_from', 'income')
        ->sum('amount');

    // Expenses deducted from savings
    $savingsExpenses = $expenses
        ->where('deduct_from', 'savings')
        ->sum('amount');

    // Total income
    $totalIncome = \App\Models\Income::where('user_id', $userId)
        ->sum('amount');

    // Total savings
    $totalSavings = \App\Models\Saving::where('user_id', $userId)
        ->sum('amount');

    return view('expense.index', compact(
        'categories',
        'expenses',
        'totalExpenses',
        'incomeExpenses',
        'savingsExpenses',
        'totalIncome',
        'totalSavings'
    ));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'expense_category_id' => 'required|exists:expense_categories,id',
            'deduct_from' => 'required|in:income,savings',
            'expense_date' => 'required|date',
        ]);

        $category = ExpenseCategory::where('id', $validated['expense_category_id'])
            ->where('user_id', auth()->id())
            ->firstOrFail();

        Expense::create([
            'user_id' => auth()->id(),
            'expense_category_id' => $category->id,
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'deduct_from' => $validated['deduct_from'],
            'expense_date' => $validated['expense_date'],
        ]);

        return redirect()
            ->route('expense.index')
            ->with('success', 'Expense added successfully!');
    }

    public function create()
    {
        return redirect()->route('expense.index');
    }

    public function edit(Expense $expense)
    {
        abort_unless($expense->user_id === auth()->id(), 403);

        $categories = ExpenseCategory::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();

        return view('expense.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, Expense $expense)
    {
        abort_unless($expense->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'expense_category_id' => 'required|exists:expense_categories,id',
            'deduct_from' => 'required|in:income,savings',
            'expense_date' => 'required|date',
        ]);

        $category = ExpenseCategory::where('id', $validated['expense_category_id'])
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $expense->update([
            'expense_category_id' => $category->id,
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'deduct_from' => $validated['deduct_from'],
            'expense_date' => $validated['expense_date'],
        ]);

        return redirect()
            ->route('expense.index')
            ->with('success', 'Expense updated successfully!');
    }

    public function destroy(Expense $expense)
    {
        abort_unless($expense->user_id === auth()->id(), 403);

        $expense->delete();

        return redirect()
            ->route('expense.index')
            ->with('success', 'Expense deleted successfully!');
    }

    public function show(Expense $expense)
    {
        abort_unless($expense->user_id === auth()->id(), 403);

        return redirect()->route('expense.index');
    }
}