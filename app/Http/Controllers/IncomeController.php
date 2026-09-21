<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', auth()->id())
            ->whereIn('source', [
                'Salary - First Payday',
                'Salary - Second Payday'
            ])
            ->orderBy('income_date')
            ->get();

        $firstPayday = $incomes
            ->where('source', 'Salary - First Payday')
            ->first();

        $secondPayday = $incomes
            ->where('source', 'Salary - Second Payday')
            ->first();

        $monthlyIncome = $incomes->sum('amount');

        return view('income.index', compact(
            'firstPayday',
            'secondPayday',
            'monthlyIncome'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_payday' => 'nullable|date',
            'first_amount' => 'nullable|numeric|min:0',
            'second_payday' => 'nullable|date',
            'second_amount' => 'nullable|numeric|min:0',
        ]);

        /*
        |--------------------------------------------------------------------------
        | First Payday
        |--------------------------------------------------------------------------
        */

        if (
            !empty($validated['first_payday']) &&
            isset($validated['first_amount']) &&
            $validated['first_amount'] !== ''
        ) {
            Income::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'source' => 'Salary - First Payday',
                ],
                [
                    'amount' => $validated['first_amount'],
                    'income_date' => $validated['first_payday'],
                    'description' => 'First monthly salary',
                ]
            );
        } else {
            Income::where('user_id', auth()->id())
                ->where('source', 'Salary - First Payday')
                ->delete();
        }

        /*
        |--------------------------------------------------------------------------
        | Second Payday
        |--------------------------------------------------------------------------
        */

        if (
            !empty($validated['second_payday']) &&
            isset($validated['second_amount']) &&
            $validated['second_amount'] !== ''
        ) {
            Income::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'source' => 'Salary - Second Payday',
                ],
                [
                    'amount' => $validated['second_amount'],
                    'income_date' => $validated['second_payday'],
                    'description' => 'Second monthly salary',
                ]
            );
        } else {
            Income::where('user_id', auth()->id())
                ->where('source', 'Salary - Second Payday')
                ->delete();
        }

        return redirect()
            ->route('income.index')
            ->with('success', 'Salary and payday settings saved successfully!');
    }

    public function create()
    {
        return redirect()->route('income.index');
    }

    public function edit(Income $income)
    {
        abort_unless($income->user_id === auth()->id(), 403);

        return redirect()->route('income.index');
    }

    public function update(Request $request, Income $income)
    {
        abort_unless($income->user_id === auth()->id(), 403);

        return redirect()->route('income.index');
    }

    public function destroy(Income $income)
    {
        abort_unless($income->user_id === auth()->id(), 403);

        $income->delete();

        return redirect()
            ->route('income.index')
            ->with('success', 'Salary schedule deleted successfully!');
    }
}