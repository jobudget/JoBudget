```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Expense - JoBudget</title>

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
           LAYOUT
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
           MAIN
        ========================= */

        .jb-main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }

        .edit-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 35px;
        }

        /* =========================
           HEADER
        ========================= */

        .edit-header {
            margin-bottom: 25px;
        }

        .edit-header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 800;
            color: #111827;
        }

        .edit-header p {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           CARD
        ========================= */

        .edit-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 30px;
            border: 1px solid #eef0ef;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.04);
        }

        .edit-card h2 {
            margin: 0 0 8px;
            font-size: 21px;
            color: #111827;
        }

        .edit-card-description {
            margin: 0 0 25px;
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           ALERT
        ========================= */

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
           FORM
        ========================= */

        .edit-form {
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
           BUTTONS
        ========================= */

        .button-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }

        .btn-save {
            border: none;
            background: #16a34a;
            color: #ffffff;
            padding: 13px 22px;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-save:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .btn-cancel:hover {
            background: #e5e7eb;
        }

        /* =========================
           DELETE
        ========================= */

        .delete-section {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .delete-section h3 {
            margin: 0 0 6px;
            color: #991b1b;
            font-size: 16px;
        }

        .delete-section p {
            margin: 0 0 15px;
            color: #6b7280;
            font-size: 13px;
        }

        .btn-delete {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #dc2626;
            padding: 10px 15px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #fee2e2;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .edit-form {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .deduct-options {
                grid-template-columns: 1fr;
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

            .edit-content {
                padding: 20px 15px;
            }

            .edit-card {
                padding: 20px;
            }

            .edit-header h1 {
                font-size: 26px;
            }

            .button-row {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-save,
            .btn-cancel {
                width: 100%;
            }
        }
    </style>
</head>

<body>

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


            <a href="#">

                <span class="jb-nav-icon">
                    🐷
                </span>

                <span>
                    Savings
                </span>

            </a>


            <a href="#">

                <span class="jb-nav-icon">
                    🎯
                </span>

                <span>
                    Goals
                </span>

            </a>


            <a href="#">

                <span class="jb-nav-icon">
                    📊
                </span>

                <span>
                    Budgets
                </span>

            </a>


            <a href="#">

                <span class="jb-nav-icon">
                    📈
                </span>

                <span>
                    Reports
                </span>

            </a>

        </nav>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="jb-main">

        <div class="edit-content">

            <!-- HEADER -->

            <div class="edit-header">

                <h1>
                    Edit Expense
                </h1>

                <p>
                    Update the details of your expense.
                </p>

            </div>


            <!-- VALIDATION ERRORS -->

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


            <!-- EDIT CARD -->

            <div class="edit-card">

                <h2>
                    Expense Information
                </h2>

                <p class="edit-card-description">
                    Change the information below and save your changes.
                </p>


                <!-- UPDATE FORM -->

                <form
                    action="{{ route('expense.update', $expense) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    <div class="edit-form">

                        <!-- EXPENSE NAME -->

                        <div class="form-group">

                            <label for="description">
                                Expense Name
                            </label>

                            <input
                                type="text"
                                id="description"
                                name="description"
                                class="form-control"
                                value="{{ old('description', $expense->description) }}"
                                placeholder="e.g. Internet Bill"
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
                                value="{{ old('amount', $expense->amount) }}"
                                min="0.01"
                                step="0.01"
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
                                        {{ old('expense_category_id', $expense->expense_category_id) == $category->id ? 'selected' : '' }}
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
                                value="{{ old('expense_date', $expense->expense_date->format('Y-m-d')) }}"
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
                                        {{ old('deduct_from', $expense->deduct_from) === 'income' ? 'checked' : '' }}
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
                                        {{ old('deduct_from', $expense->deduct_from) === 'savings' ? 'checked' : '' }}
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


                        <!-- BUTTONS -->

                        <div class="form-group full">

                            <div class="button-row">

                                <button
                                    type="submit"
                                    class="btn-save"
                                >
                                    💾 Save Changes
                                </button>


                                <a
                                    href="{{ route('expense.index') }}"
                                    class="btn-cancel"
                                >
                                    Cancel
                                </a>

                            </div>

                        </div>

                    </div>

                </form>


                <!-- =========================
                     DELETE EXPENSE
                ========================= -->

                <div class="delete-section">

                    <h3>
                        Delete Expense
                    </h3>

                    <p>
                        Permanently remove this expense from your expense history.
                    </p>


                    <form
                        action="{{ route('expense.destroy', $expense) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this expense?');"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn-delete"
                        >
                            🗑️ Delete Expense
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>
```
