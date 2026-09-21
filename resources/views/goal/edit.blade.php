<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Goal - JoBudget</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    /* =========================
       MOBILE HAMBURGER
    ========================= */

    .jb-mobile-menu {
        display: none;
        position: fixed;
        top: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        align-items: center;
        justify-content: center;
        border: none;
        border-radius: 10px;
        background: #7aa35a;
        color: white;
        font-size: 23px;
        cursor: pointer;
        z-index: 3000;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
    }

    .jb-sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1999;
    }

    @media (max-width: 900px) {

        .jb-sidebar {
            position: fixed;
            top: 0;
            left: -270px;
            width: 250px;
            height: 100vh;
            z-index: 2000;
            transition: left 0.25s ease;
            overflow-y: auto;
        }

        .jb-sidebar.mobile-open {
            left: 0;
        }

        .jb-mobile-menu {
            display: flex;
        }

        .jb-sidebar-overlay.mobile-open {
            display: block;
        }

        .jb-main {
            margin-left: 0 !important;
            width: 100%;
            padding: 80px 20px 30px;
        }

        .jb-content-grid {
            grid-template-columns: 1fr !important;
        }
    }

    @media (max-width: 600px) {

        .jb-main {
            padding: 75px 15px 25px;
        }

        .jb-mobile-menu {
            width: 42px;
            height: 42px;
            top: 12px;
            left: 12px;
        }

        .jb-welcome h1 {
            font-size: 24px;
            line-height: 1.3;
        }

        .jb-welcome p {
            font-size: 13px;
        }

        .jb-card {
            width: 100%;
        }

        .jb-form-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .jb-form-buttons .jb-btn {
            width: 100%;
        }
    }

    @media (max-width: 400px) {

        .jb-main {
            padding: 70px 10px 20px;
        }

        .jb-mobile-menu {
            width: 40px;
            height: 40px;
            top: 10px;
            left: 10px;
        }
    }
</style>
</head>

<body>

<!-- MOBILE HAMBURGER -->
<button
    type="button"
    id="mobileMenuToggle"
    class="jb-mobile-menu"
    aria-label="Open navigation menu"
>
    ☰
</button>

<!-- MOBILE OVERLAY -->
<div id="mobileSidebarOverlay" class="jb-sidebar-overlay"></div>

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
<script>
document.addEventListener('DOMContentLoaded', function () {

    const menuButton =
        document.getElementById('mobileMenuToggle');

    const sidebar =
        document.querySelector('.jb-sidebar');

    const overlay =
        document.getElementById('mobileSidebarOverlay');

    if (!menuButton || !sidebar || !overlay) {
        return;
    }

    function openSidebar() {

        sidebar.classList.add('mobile-open');
        overlay.classList.add('mobile-open');

        menuButton.textContent = '✕';

        menuButton.setAttribute(
            'aria-label',
            'Close navigation menu'
        );
    }

    function closeSidebar() {

        sidebar.classList.remove('mobile-open');
        overlay.classList.remove('mobile-open');

        menuButton.textContent = '☰';

        menuButton.setAttribute(
            'aria-label',
            'Open navigation menu'
        );
    }

    menuButton.addEventListener('click', function () {

        if (sidebar.classList.contains('mobile-open')) {
            closeSidebar();
        } else {
            openSidebar();
        }

    });

    overlay.addEventListener(
        'click',
        closeSidebar
    );

    sidebar.querySelectorAll('.jb-nav a').forEach(function (link) {

        link.addEventListener(
            'click',
            closeSidebar
        );

    });

});
</script>
</body>
</html>