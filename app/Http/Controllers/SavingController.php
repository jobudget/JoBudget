<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $savings = Saving::where('user_id', $userId)
            ->orderByDesc('saving_date')
            ->orderByDesc('created_at')
            ->get();

        $totalSavings = $savings->sum('amount');

        return view('saving.index', compact(
            'savings',
            'totalSavings'
        ));
    }

    public function create()
    {
        return view('saving.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'saving_date' => 'required|date',
        ]);

        Saving::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'amount' => $validated['amount'],
            'saving_date' => $validated['saving_date'],
        ]);

        return redirect()
            ->route('saving.index')
            ->with('success', 'Savings added successfully!');
    }

    public function show(Saving $saving)
    {
        abort_unless(
            $saving->user_id === auth()->id(),
            403
        );

        return redirect()->route('saving.index');
    }

    public function edit(Saving $saving)
    {
        abort_unless(
            $saving->user_id === auth()->id(),
            403
        );

        return view('saving.edit', compact('saving'));
    }

    public function update(Request $request, Saving $saving)
    {
        abort_unless(
            $saving->user_id === auth()->id(),
            403
        );

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'saving_date' => 'required|date',
        ]);

        $saving->update([
            'name' => $validated['name'],
            'amount' => $validated['amount'],
            'saving_date' => $validated['saving_date'],
        ]);

        return redirect()
            ->route('saving.index')
            ->with('success', 'Savings updated successfully!');
    }

    public function destroy(Saving $saving)
    {
        abort_unless(
            $saving->user_id === auth()->id(),
            403
        );

        $saving->delete();

        return redirect()
            ->route('saving.index')
            ->with('success', 'Savings deleted successfully!');
    }
}