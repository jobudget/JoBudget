<?php

namespace App\Http\Controllers;

use App\Models\FinancialGoal;
use Illuminate\Http\Request;

class FinancialGoalController extends Controller
{
    /**
     * Display all goals.
     */
    public function index()
    {
        $goals = FinancialGoal::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('goal.index', compact('goals'));
    }

    /**
     * Show create goal form.
     */
    public function create()
    {
        return view('goal.create');
    }

    /**
     * Store a new goal.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'target_amount' => 'required|numeric|min:0.01',
            'current_amount' => 'nullable|numeric|min:0',
            'target_date' => 'nullable|date',
            'description' => 'nullable|string|max:1000',
        ]);

        FinancialGoal::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'target_amount' => $validated['target_amount'],
            'current_amount' => $validated['current_amount'] ?? 0,
            'target_date' => $validated['target_date'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('goal.index')
            ->with('success', 'Goal created successfully!');
    }

    /**
     * Display a goal.
     */
    public function show(FinancialGoal $goal)
    {
        abort_unless(
            $goal->user_id === auth()->id(),
            403
        );

        return view('goal.show', compact('goal'));
    }

    /**
     * Show edit form.
     */
    public function edit(FinancialGoal $goal)
    {
        abort_unless(
            $goal->user_id === auth()->id(),
            403
        );

        return view('goal.edit', compact('goal'));
    }

    /**
     * Update a goal.
     */
    public function update(Request $request, FinancialGoal $goal)
    {
        abort_unless(
            $goal->user_id === auth()->id(),
            403
        );

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'target_amount' => 'required|numeric|min:0.01',
            'current_amount' => 'nullable|numeric|min:0',
            'target_date' => 'nullable|date',
            'description' => 'nullable|string|max:1000',
        ]);

        $goal->update([
            'name' => $validated['name'],
            'target_amount' => $validated['target_amount'],
            'current_amount' => $validated['current_amount'] ?? 0,
            'target_date' => $validated['target_date'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('goal.index')
            ->with('success', 'Goal updated successfully!');
    }

    /**
     * Delete a goal.
     */
    public function destroy(FinancialGoal $goal)
    {
        abort_unless(
            $goal->user_id === auth()->id(),
            403
        );

        $goal->delete();

        return redirect()
            ->route('goal.index')
            ->with('success', 'Goal deleted successfully!');
    }
}