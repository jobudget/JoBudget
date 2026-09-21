<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Goal - JoBudget</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="jb-layout">

    {{-- Sidebar --}}
    <aside class="jb-sidebar">

        <div class="jb-logo">
            <div class="jb-logo-icon">🐿️</div>

            <div>
                <div class="jb-logo-text">JoBudget</div>
                <span class="jb-logo-subtitle">
                    PERSONAL FINANCE
                </span>
            </div>
        </div>

        <nav class="jb-nav">

            <a href="{{ route('dashboard') }}">
                <span class="jb-nav-icon">🏠</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('income.index') }}">
                <span class="jb-nav-icon">💰</span>
                <span>Income</span>
            </a>

            <a href="{{ route('expense.index') }}">
                <span class="jb-nav-icon">💸</span>
                <span>Expenses</span>
            </a>

            <a href="{{ route('saving.index') }}">
                <span class="jb-nav-icon">💵</span>
                <span>Savings</span>
            </a>

            <a href="{{ route('goal.index') }}" class="active">
                <span class="jb-nav-icon">🎯</span>
                <span>Goals</span>
            </a>

        </nav>

    </aside>


    {{-- Main --}}
    <main class="jb-main">

        <div class="jb-container">

            {{-- Header --}}
            <header class="jb-header">

                <div>
                    <h1>Edit Financial Goal</h1>
                    <p style="color: var(--jb-muted); margin-top: 5px;">
                        Update your financial goal.
                    </p>
                </div>

                <div class="jb-header-right">

                    <button
                        type="button"
                        id="darkModeToggle"
                        class="jb-dark-mode-top"
                    >
                        <span id="darkModeIcon">🌙</span>
                    </button>

                    <div class="jb-notification">
                        🔔
                    </div>

                    <div class="jb-profile">
                        <div class="jb-avatar">👨🏻</div>
                        <span>{{ auth()->user()->name }}</span>
                    </div>

                </div>

            </header>


            {{-- Form --}}
            <div class="jb-card" style="max-width: 800px; margin: 0 auto; padding: 25px;">

                @if ($errors->any())

                    <div style="
                        background: var(--jb-red-light);
                        color: var(--jb-red);
                        padding: 12px 15px;
                        border-radius: 12px;
                        margin-bottom: 20px;
                    ">
                        <strong>Please fix the following:</strong>

                        <ul style="margin: 8px 0 0 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif


                <form
                    action="{{ route('goal.update', $goal) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    {{-- Goal Name --}}
                    <div class="jb-form-group">

                        <label class="jb-form-label">
                            Goal Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="jb-input"
                            value="{{ old('name', $goal->name) }}"
                            placeholder="Example: New PC"
                            required
                        >

                    </div>


                    {{-- Target Amount --}}
                    <div class="jb-form-group">

                        <label class="jb-form-label">
                            Target Amount
                        </label>

                        <input
                            type="number"
                            name="target_amount"
                            class="jb-input"
                            value="{{ old('target_amount', $goal->target_amount) }}"
                            min="0.01"
                            step="0.01"
                            placeholder="₱0.00"
                            required
                        >

                    </div>


                    {{-- Current Amount --}}
                    <div class="jb-form-group">

                        <label class="jb-form-label">
                            Current Amount
                        </label>

                        <input
                            type="number"
                            name="current_amount"
                            class="jb-input"
                            value="{{ old('current_amount', $goal->current_amount) }}"
                            min="0"
                            step="0.01"
                            placeholder="₱0.00"
                        >

                    </div>


                    {{-- Target Date --}}
                    <div class="jb-form-group">

                        <label class="jb-form-label">
                            Target Date
                        </label>

                        <input
                            type="date"
                            name="target_date"
                            class="jb-input"
                            value="{{ old(
                                'target_date',
                                $goal->target_date
                                    ? $goal->target_date->format('Y-m-d')
                                    : ''
                            ) }}"
                        >

                    </div>


                    {{-- Description --}}
                    <div class="jb-form-group">

                        <label class="jb-form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            class="jb-input"
                            rows="4"
                            placeholder="Optional description..."
                        >{{ old('description', $goal->description) }}</textarea>

                    </div>


                    {{-- Buttons --}}
                    <div style="
                        display:flex;
                        gap:10px;
                        justify-content:flex-end;
                        margin-top:25px;
                    ">

                        <a
                            href="{{ route('goal.index') }}"
                            class="jb-btn jb-btn-secondary"
                            style="text-decoration:none;"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="jb-btn"
                        >
                            Update Goal
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>


{{-- Dark Mode --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const button = document.getElementById('darkModeToggle');
    const icon = document.getElementById('darkModeIcon');

    if (!button) return;

    function updateDarkMode() {

        if (document.body.classList.contains('dark-mode')) {
            icon.textContent = '☀️';
        } else {
            icon.textContent = '🌙';
        }

    }

    if (localStorage.getItem('jobudget-dark-mode') === 'enabled') {
        document.body.classList.add('dark-mode');
    }

    updateDarkMode();

    button.addEventListener('click', function () {

        document.body.classList.toggle('dark-mode');

        localStorage.setItem(
            'jobudget-dark-mode',
            document.body.classList.contains('dark-mode')
                ? 'enabled'
                : 'disabled'
        );

        updateDarkMode();

    });

});
</script>

</body>
</html>