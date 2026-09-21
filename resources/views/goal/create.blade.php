<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JoBudget - Create Goal</title>

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
    <style>

        .goal-create-page {
            min-height: 100vh;
            background: #f8faf7;
        }

        .goal-form-header {
            margin-bottom: 25px;
        }

        .goal-form-header h1 {
            margin: 0;
            color: #1f2937;
            font-size: 28px;
        }

        .goal-form-header p {
            margin-top: 6px;
            color: #7b8794;
        }

        .goal-form-card {
            max-width: 700px;
            background: #ffffff;
            border: 1px solid #edf0ed;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(30, 60, 45, .07);
        }

        .goal-form-group {
            margin-bottom: 20px;
        }

        .goal-form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #374151;
        }

        .goal-form-group input,
        .goal-form-group textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            border: 1px solid #dfe5df;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: border-color .2s ease;
        }

        .goal-form-group input:focus,
        .goal-form-group textarea:focus {
            border-color: #2f9e62;
        }

        .goal-form-group textarea {
            min-height: 110px;
            resize: vertical;
        }

        .goal-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .goal-form-help {
            margin-top: 5px;
            font-size: 12px;
            color: #94a3b8;
        }

        .goal-form-error {
            margin-top: 6px;
            font-size: 12px;
            color: #d9534f;
        }

        .goal-form-actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .goal-save-btn {
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            background: #2f9e62;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .goal-save-btn:hover {
            background: #217747;
        }

        .goal-cancel-btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 20px;
            border-radius: 10px;
            background: #f1f3f1;
            color: #555;
            text-decoration: none;
            font-weight: 700;
        }

        .goal-cancel-btn:hover {
            background: #e5e8e5;
        }

        @media (max-width: 700px) {

            .goal-form-row {
                grid-template-columns: 1fr;
            }

            .goal-form-card {
                padding: 20px;
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

    <!-- SIDEBAR -->

    <aside class="jb-sidebar">

        <div class="jb-logo">

            <div class="jb-logo-icon">
                🐿️
            </div>

            <div>

                <div class="jb-logo-text">
                    JoBudget
                </div>

                <span class="jb-logo-subtitle">
                    Small Steps, Big Dreams
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

                <span class="jb-nav-icon">🐷</span>

                <span>Savings</span>

            </a>


            <a
                href="{{ route('goal.index') }}"
                class="active"
            >

                <span class="jb-nav-icon">🎯</span>

                <span>Goals</span>

            </a>

        </nav>


        

        </form>


        <div class="jb-sidebar-quote">

            🌱

            <br>

            <strong>
                Better choices today,
            </strong>

            <br>

            freer tomorrow.

        </div>

    </aside>


    <!-- MAIN -->

    <main class="jb-main">

        <div class="jb-container goal-create-page">

            <div class="goal-form-header">

                <h1>
                    🎯 Create Financial Goal
                </h1>

                <p>
                    Set a target and start tracking your progress.
                </p>

            </div>


            <div class="goal-form-card">

                <form
                    method="POST"
                    action="{{ route('goal.store') }}"
                >

                    @csrf


                    <!-- GOAL NAME -->

                    <div class="goal-form-group">

                        <label for="name">
                            Goal Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="e.g. New PC"
                            required
                        >

                        @error('name')

                            <div class="goal-form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- AMOUNTS -->

                    <div class="goal-form-row">

                        <div class="goal-form-group">

                            <label for="target_amount">
                                Target Amount
                            </label>

                            <input
                                type="number"
                                id="target_amount"
                                name="target_amount"
                                value="{{ old('target_amount') }}"
                                placeholder="40000"
                                min="0.01"
                                step="0.01"
                                required
                            >

                            <div class="goal-form-help">
                                How much do you need?
                            </div>

                            @error('target_amount')

                                <div class="goal-form-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="goal-form-group">

                            <label for="current_amount">
                                Current Amount
                            </label>

                            <input
                                type="number"
                                id="current_amount"
                                name="current_amount"
                                value="{{ old('current_amount', 0) }}"
                                placeholder="0"
                                min="0"
                                step="0.01"
                            >

                            <div class="goal-form-help">
                                How much have you saved?
                            </div>

                            @error('current_amount')

                                <div class="goal-form-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>


                    <!-- TARGET DATE -->

                    <div class="goal-form-group">

                        <label for="target_date">
                            Target Date
                        </label>

                        <input
                            type="date"
                            id="target_date"
                            name="target_date"
                            value="{{ old('target_date') }}"
                        >

                        <div class="goal-form-help">
                            Optional — when do you want to reach this goal?
                        </div>

                        @error('target_date')

                            <div class="goal-form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="goal-form-group">

                        <label for="description">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Add some details about your goal..."
                        >{{ old('description') }}</textarea>

                        @error('description')

                            <div class="goal-form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- BUTTONS -->

                    <div class="goal-form-actions">

                        <button
                            type="submit"
                            class="goal-save-btn"
                        >
                            💾 Save Goal
                        </button>


                        <a
                            href="{{ route('goal.index') }}"
                            class="goal-cancel-btn"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>
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