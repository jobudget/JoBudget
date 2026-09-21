```html
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

        /* SIDEBAR */
        .jb-sidebar {
            width: 250px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 25px 18px;
            flex-shrink: 0;
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

        /* MAIN */
        .jb-main {
            flex: 1;
            padding: 40px;
            max-width: 1100px;
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

        /* FORM CARD */
        .form-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 30px;
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

        /* BUTTONS */
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

        /* MOBILE */
        @media (max-width: 768px) {
            .jb-layout {
                flex-direction: column;
            }

            .jb-sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e5e7eb;
            }

            .jb-nav {
                flex-direction: row;
                overflow-x: auto;
            }

            .jb-nav a {
                white-space: nowrap;
            }

            .jb-main {
                padding: 25px 18px;
            }

            .form-card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<div class="jb-layout">

    <!-- SIDEBAR -->
    <aside class="jb-sidebar">

        <div class="jb-logo">
            <div class="jb-logo-icon">🐿️</div>

            <div>
                <div class="jb-logo-title">JoBudget</div>
                <div class="jb-logo-subtitle">Smart Money Tracker</div>
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

            <a href="#">
                <span class="jb-nav-icon">🎯</span>
                <span>Goals</span>
            </a>

            <a href="#">
                <span class="jb-nav-icon">📊</span>
                <span>Budgets</span>
            </a>

            <a href="#">
                <span class="jb-nav-icon">📈</span>
                <span>Reports</span>
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

                <!-- DESCRIPTION -->
                <div class="form-group">

                    <label for="description" class="form-label">
                        Savings Description
                    </label>

                    <input
                        type="text"
                        id="description"
                        name="description"
                        class="form-input"
                        placeholder="e.g. Emergency Fund"
                        value="{{ old('description') }}"
                        required
                    >

                    @error('description')
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

                    <a href="{{ route('saving.index') }}" class="btn btn-cancel">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>
```
