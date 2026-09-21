<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Expenses - JoBudget</title>
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
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7f6;
            color: #1f2937;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           MAIN LAYOUT
        ========================= */

        .jb-layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .jb-sidebar {
            width: 250px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 24px 16px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 10;
        }

        .jb-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 28px;
        }

        .jb-logo-icon {
            width: 48px;
            height: 48px;
            background: #dcfce7;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .jb-logo-title {
            font-size: 20px;
            font-weight: 800;
            color: #166534;
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
            padding: 12px 14px;
            border-radius: 12px;
            color: #4b5563;
            font-size: 14px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .jb-nav a:hover {
            background: #f0fdf4;
            color: #166534;
        }

        .jb-nav a.active {
            background: #dcfce7;
            color: #166534;
        }

        .jb-nav-icon {
            width: 24px;
            text-align: center;
            font-size: 18px;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .jb-main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }

        .expense-page {
            background: #f5f7f6;
        }

        .expense-content {
            max-width: 1300px;
            margin: 0 auto;
            padding: 35px;
        }

        /* =========================
           HEADER
        ========================= */

        .expense-header {
            margin-bottom: 25px;
        }

        .expense-header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 800;
            color: #111827;
        }

        .expense-header p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           ALERTS
        ========================= */

        .success-message {
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .error-message {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .error-message strong {
            display: block;
            margin-bottom: 7px;
        }

        .error-message ul {
            margin: 0;
            padding-left: 20px;
        }

        /* =========================
           SUMMARY
        ========================= */

        .expense-summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 22px;
        }

        .summary-box {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px;
            border: 1px solid #eef0ef;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.04);
        }

        .summary-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 700;
        }

        .summary-value {
            color: #111827;
            font-size: 25px;
            font-weight: 800;
            margin-top: 8px;
        }

        /* =========================
           CARDS
        ========================= */

        .expense-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 22px;
            border: 1px solid #eef0ef;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.04);
        }

        .expense-card h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            color: #111827;
        }

        .expense-card > p {
            margin: 7px 0 22px;
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           FORM
        ========================= */

        .expense-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-size: 14px;
            font-weight: 700;
        }

        .form-control {
            width: 100%;
            height: 46px;
            padding: 0 13px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            background: #ffffff;
            color: #111827;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: 0.2s ease;
        }

        .form-control:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.10);
        }

        /* =========================
           DEDUCT OPTIONS
        ========================= */

        .deduct-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .deduct-option input {
            display: none;
        }

        .deduct-option label {
            display: block;
            border: 2px solid #e5e7eb;
            border-radius: 13px;
            padding: 16px;
            cursor: pointer;
            transition: 0.2s ease;
            margin: 0;
        }

        .deduct-option label:hover {
            border-color: #86efac;
            background: #fafffb;
        }

        .deduct-option input:checked + label {
            border-color: #16a34a;
            background: #f0fdf4;
        }

        .deduct-title {
            display: block;
            font-size: 14px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 5px;
        }

        .deduct-description {
            display: block;
            font-size: 12px;
            line-height: 1.5;
            color: #6b7280;
            font-weight: 500;
        }

        /* =========================
           ADD BUTTON
        ========================= */

        .btn-add {
            border: none;
            background: #16a34a;
            color: #ffffff;
            padding: 13px 20px;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-add:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        /* =========================
           TABLE
        ========================= */

        .expense-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .expense-table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        .expense-table th {
            padding: 14px 12px;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 12px;
            font-weight: 800;
            text-align: left;
            white-space: nowrap;
        }

        .expense-table td {
            padding: 16px 12px;
            border-bottom: 1px solid #f0f1f1;
            color: #374151;
            font-size: 14px;
            vertical-align: middle;
        }

        .expense-table tbody tr:last-child td {
            border-bottom: none;
        }

        .expense-table tbody tr:hover {
            background: #fafafa;
        }

        .expense-table td strong {
            color: #111827;
        }

        /* =========================
           CATEGORY BADGE
        ========================= */

        .category-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: #f3f4f6;
            color: #374151;
            font-size: 11px;
            font-weight: 800;
        }

        /* =========================
           SOURCE BADGE
        ========================= */

        .source-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .income-badge {
            background: #dcfce7;
            color: #166534;
        }

        .savings-badge {
            background: #fef3c7;
            color: #92400e;
        }

        /* =========================
           EDIT BUTTON
        ========================= */

        .btn-edit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .btn-edit:hover {
            background: #dbeafe;
            border-color: #93c5fd;
            color: #1d4ed8;
            transform: translateY(-1px);
        }

        /* =========================
           EMPTY MESSAGE
        ========================= */

        .empty-message {
            color: #6b7280;
            font-size: 14px;
            margin: 20px 0 0;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .expense-summary {
                grid-template-columns: 1fr;
            }

            .expense-form {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }

        @media (max-width: 750px) {

            .jb-sidebar {
                width: 70px;
                padding: 15px 8px;
            }

            .jb-logo {
                justify-content: center;
                padding: 5px 0 20px;
            }

            .jb-logo > div:last-child {
                display: none;
            }

            .jb-logo-icon {
                width: 45px;
                height: 45px;
            }

            .jb-nav a {
                justify-content: center;
                padding: 12px 5px;
            }

            .jb-nav a span:last-child {
                display: none;
            }

            .jb-main {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .expense-content {
                padding: 20px 15px;
            }

            .expense-header h1 {
                font-size: 26px;
            }

            .deduct-options {
                grid-template-columns: 1fr;
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

    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="jb-sidebar">

        <div class="jb-logo">

            <div class="jb-logo-icon">
                🐿️
            </div>

            <div>
                <div class="jb-logo-title">
                    JoBudget
                </div>

                <div class="jb-logo-subtitle">
                    Smart Money Tracker
                </div>
            </div>

        </div>

        <nav class="jb-nav">

            <a href="{{ route('dashboard') }}">

                <span class="jb-nav-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <a href="{{ route('income.index') }}">

                <span class="jb-nav-icon">
                    💰
                </span>

                <span>
                    Income
                </span>

            </a>


            <a href="{{ route('expense.index') }}" class="active">

                <span class="jb-nav-icon">
                    💸
                </span>

                <span>
                    Expenses
                </span>

            </a>


            <a href="{{ route('saving.index') }}">

                <span class="jb-nav-icon">
                    🐷
                </span>

                <span>
                    Savings
                </span>

            </a>


          


           

        </nav>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="jb-main expense-page">

        <div class="expense-content">

            <!-- HEADER -->

            <div class="expense-header">

                <h1>
                    Expenses
                </h1>

                <p>
                    Record your expenses and choose where the money should be deducted from.
                </p>

            </div>


            <!-- SUCCESS -->

            @if(session('success'))

                <div class="success-message">
                    {{ session('success') }}
                </div>

            @endif


            <!-- ERRORS -->

            @if($errors->any())

                <div class="error-message">

                    <strong>
                        Please fix the following:
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- =========================
                 SUMMARY
            ========================= -->

            <div class="expense-summary">

                <div class="summary-box">

                    <div class="summary-label">
                        Total Expenses
                    </div>

                    <div class="summary-value">
                        ₱{{ number_format($totalExpenses, 2) }}
                    </div>

                </div>


                <div class="summary-box">

                    <div class="summary-label">
                        Deducted From Income
                    </div>

                    <div class="summary-value">
                        ₱{{ number_format($incomeExpenses, 2) }}
                    </div>

                </div>


                <div class="summary-box">

                    <div class="summary-label">
                        Deducted From Savings
                    </div>

                    <div class="summary-value">
                        ₱{{ number_format($savingsExpenses, 2) }}
                    </div>

                </div>

            </div>


            <!-- =========================
                 ADD EXPENSE
            ========================= -->

            <div class="expense-card">

                <h2>
                    Add Expense
                </h2>

                <p>
                    Enter your expense information below.
                </p>


                <form
                    action="{{ route('expense.store') }}"
                    method="POST"
                >

                    @csrf

                    <div class="expense-form">

                        <!-- EXPENSE NAME -->

                        <div class="form-group">

                            <label for="expense_name">
                                Expense Name
                            </label>

                            <input
                                type="text"
                                id="expense_name"
                                name="description"
                                class="form-control"
                                placeholder="e.g. Internet Bill"
                                value="{{ old('description') }}"
                                required
                            >

                        </div>


                        <!-- AMOUNT -->

                        <div class="form-group">

                            <label for="amount">
                                Amount
                            </label>

                            <input
                                type="number"
                                id="amount"
                                name="amount"
                                class="form-control"
                                placeholder="e.g. 1500"
                                min="0.01"
                                step="0.01"
                                value="{{ old('amount') }}"
                                required
                            >

                        </div>


                        <!-- CATEGORY -->

                        <div class="form-group">

                            <label for="expense_category_id">
                                Category
                            </label>

                            <select
                                id="expense_category_id"
                                name="expense_category_id"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Select Category
                                </option>

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('expense_category_id') == $category->id ? 'selected' : '' }}
                                    >
                                        {{ $category->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- DATE -->

                        <div class="form-group">

                            <label for="expense_date">
                                Expense Date
                            </label>

                            <input
                                type="date"
                                id="expense_date"
                                name="expense_date"
                                class="form-control"
                                value="{{ old('expense_date', now()->format('Y-m-d')) }}"
                                required
                            >

                        </div>


                        <!-- DEDUCT FROM -->

                        <div class="form-group full">

                            <label>
                                Deduct From
                            </label>


                            <div class="deduct-options">

                                <!-- INCOME -->

                                <div class="deduct-option">

                                    <input
                                        type="radio"
                                        id="income"
                                        name="deduct_from"
                                        value="income"
                                        {{ old('deduct_from', 'income') === 'income' ? 'checked' : '' }}
                                    >

                                    <label for="income">

                                        <span class="deduct-title">
                                            💰 Monthly Income
                                        </span>

                                        <span class="deduct-description">
                                            Deduct this expense from your available monthly income.
                                        </span>

                                    </label>

                                </div>


                                <!-- SAVINGS -->

                                <div class="deduct-option">

                                    <input
                                        type="radio"
                                        id="savings"
                                        name="deduct_from"
                                        value="savings"
                                        {{ old('deduct_from') === 'savings' ? 'checked' : '' }}
                                    >

                                    <label for="savings">

                                        <span class="deduct-title">
                                            🐷 Savings
                                        </span>

                                        <span class="deduct-description">
                                            Deduct this expense from your savings.
                                        </span>

                                    </label>

                                </div>

                            </div>

                        </div>


                        <!-- SUBMIT -->

                        <div class="form-group full">

                            <button
                                type="submit"
                                class="btn-add"
                            >
                                ➕ Add Expense
                            </button>

                        </div>

                    </div>

                </form>

            </div>


            <!-- =========================
                 EXPENSE HISTORY
            ========================= -->

            <div class="expense-card">

                <h2>
                    Expense History
                </h2>


                @if($expenses->count())

                    <div class="expense-table-wrapper">

                        <table class="expense-table">

                            <thead>

                                <tr>

                                    <th>
                                        Expense
                                    </th>

                                    <th>
                                        Category
                                    </th>

                                    <th>
                                        Amount
                                    </th>

                                    <th>
                                        Deducted From
                                    </th>

                                    <th>
                                        Date
                                    </th>

                                    <th>
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($expenses as $expense)

                                    <tr>

                                        <!-- EXPENSE NAME -->

                                        <td>

                                            <strong>
                                                {{ $expense->description }}
                                            </strong>

                                        </td>


                                        <!-- CATEGORY -->

                                        <td>

                                            <span class="category-badge">

                                                {{ $expense->category->name ?? 'Miscellaneous' }}

                                            </span>

                                        </td>


                                        <!-- AMOUNT -->

                                        <td>

                                            ₱{{ number_format($expense->amount, 2) }}

                                        </td>


                                        <!-- DEDUCTED FROM -->

                                        <td>

                                            @if($expense->deduct_from === 'income')

                                                <span class="source-badge income-badge">
                                                    💰 Monthly Income
                                                </span>

                                            @else

                                                <span class="source-badge savings-badge">
                                                    🐷 Savings
                                                </span>

                                            @endif

                                        </td>


                                        <!-- DATE -->

                                        <td>

                                            {{ $expense->expense_date->format('M d, Y') }}

                                        </td>


                                        <!-- EDIT -->

                                        <td>

                                            <a
                                                href="{{ route('expense.edit', $expense) }}"
                                                class="btn-edit"
                                            >
                                                ✏️ Edit
                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <p class="empty-message">
                        No expenses recorded yet.
                    </p>

                @endif

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
