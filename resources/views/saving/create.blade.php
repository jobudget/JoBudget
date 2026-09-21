<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JoBudget - Add Savings</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        .jb-layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .jb-sidebar {
            width: 250px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 25px 18px;
            flex-shrink: 0;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 2000;
            transition: left 0.25s ease;
        }

        .jb-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
        }

        .jb-logo-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #fef3c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            flex-shrink: 0;
        }

        .jb-logo-title {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        .jb-logo-subtitle {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 2px;
        }

        .jb-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .jb-nav a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            border-radius: 10px;
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .jb-nav a:hover {
            background: #f9fafb;
            color: #111827;
        }

        .jb-nav a.active {
            background: #fff7ed;
            color: #f97316;
            font-weight: 600;
        }

        .jb-nav-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        /* =========================
           MOBILE MENU
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
            background: #f97316;
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

        /* =========================
           MAIN
        ========================= */

        .jb-main {
            flex: 1;
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            min-width: 0;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 7px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 30px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
            background: #ffffff;
        }

        .form-input:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.10);
        }

        .form-help {
            margin-top: 6px;
            font-size: 12px;
            color: #9ca3af;
        }

        .error-message {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        /* =========================
           BUTTONS
        ========================= */

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 9px;
            border: none;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save {
            background: #f97316;
            color: white;
        }

        .btn-save:hover {
            background: #ea580c;
        }

        .btn-cancel {
            background: #f3f4f6;
            color: #4b5563;
        }

        .btn-cancel:hover {
            background: #e5e7eb;
        }

        /* =========================
           TABLET
        ========================= */

        @media (max-width: 900px) {

            .jb-sidebar {
                left: -270px;
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
                margin-left: 0;
                width: 100%;
                padding: 80px 25px 30px;
            }

            .page-title {
                font-size: 25px;
            }

            .form-card {
                max-width: 100%;
            }
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 600px) {

            .jb-main {
                padding: 75px 15px 25px;
            }

            .page-title {
                font-size: 23px;
                line-height: 1.3;
            }

            .page-subtitle {
                font-size: 13px;
                line-height: 1.5;
                margin-bottom: 22px;
            }

            .form-card {
                padding: 20px 16px;
                border-radius: 13px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            .form-label {
                font-size: 13px;
            }

            .form-input {
                padding: 12px;
                font-size: 14px;
            }

            .form-actions {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
                padding: 13px;
            }
        }

        /* =========================
           SMALL PHONES
        ========================= */

        @media (max-width: 400px) {

            .jb-main {
                padding: 70px 10px 20px;
            }

            .jb-mobile-menu {
                width: 42px;
                height: 42px;
                top: 12px;
                left: 12px;
            }

            .form-card {
                padding: 17px 13px;
            }

            .page-title {
                font-size: 21px;
            }

            .page-subtitle {
                font-size: 12px;
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
            <div class="jb-logo-icon">🐿️</div>

            <div>
                <div class="jb-logo-title">JoBudget</div>
                <div class="jb-logo-subtitle">
                    Smart Money Tracker
                </div>
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

            <a href="{{ route('saving.index') }}" class="active">
                <span class="jb-nav-icon">🐷</span>
                <span>Savings</span>
            </a>

            <a href="{{ route('goal.index') }}">
                <span class="jb-nav-icon">🎯</span>
                <span>Goals</span>
            </a>

        </nav>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="jb-main">

        <div class="page-title">
            Add Savings
        </div>

        <div class="page-subtitle">
            Record money that you want to set aside for your future.
        </div>

        <div class="form-card">

            <form method="POST" action="{{ route('saving.store') }}">

                @csrf

                <!-- SAVING NAME -->
                <div class="form-group">

                    <label for="name" class="form-label">
                        Savings Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input"
                        placeholder="e.g. Emergency Fund"
                        value="{{ old('name') }}"
                        required
                    >

                    @error('name')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- AMOUNT -->
                <div class="form-group">

                    <label for="amount" class="form-label">
                        Amount
                    </label>

                    <input
                        type="number"
                        id="amount"
                        name="amount"
                        class="form-input"
                        placeholder="0.00"
                        step="0.01"
                        min="0.01"
                        value="{{ old('amount') }}"
                        required
                    >

                    <div class="form-help">
                        Enter the amount you want to add to your savings.
                    </div>

                    @error('amount')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- SAVING DATE -->
                <div class="form-group">

                    <label for="saving_date" class="form-label">
                        Saving Date
                    </label>

                    <input
                        type="date"
                        id="saving_date"
                        name="saving_date"
                        class="form-input"
                        value="{{ old('saving_date', date('Y-m-d')) }}"
                        required
                    >

                    <div class="form-help">
                        Select the date when you made this savings entry.
                    </div>

                    @error('saving_date')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- BUTTONS -->
                <div class="form-actions">

                    <button type="submit" class="btn btn-save">
                        💾 Save Savings
                    </button>

                    <a
                        href="{{ route('saving.index') }}"
                        class="btn btn-cancel"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const menuButton = document.getElementById('mobileMenuToggle');
    const sidebar = document.querySelector('.jb-sidebar');
    const overlay = document.getElementById('mobileSidebarOverlay');

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

    overlay.addEventListener('click', closeSidebar);

    sidebar.querySelectorAll('.jb-nav a').forEach(function (link) {

        link.addEventListener('click', function () {
            closeSidebar();
        });

    });

});
</script>

</body>
</html>