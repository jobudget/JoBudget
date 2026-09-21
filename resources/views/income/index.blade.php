<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Salary & Payday Setup - JoBudget</title>

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
        .income-page {
            min-height: 100vh;
            background: #f6f8f7;
        }

        .income-content {
            padding: 32px;
        }

        .income-header {
            margin-bottom: 24px;
        }

        .income-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
        }

        .income-header p {
            margin-top: 6px;
            color: #6b7280;
        }

        .income-card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .income-card h2 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .income-card-description {
            color: #6b7280;
            margin-bottom: 24px;
        }

        .salary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .salary-box {
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 20px;
        }

        .salary-box h3 {
            margin-top: 0;
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .optional {
            color: #9ca3af;
            font-weight: 500;
            font-size: 13px;
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12);
        }

        .income-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .income-summary-label {
            color: #166534;
            font-weight: 700;
        }

        .income-summary-value {
            font-size: 26px;
            font-weight: 800;
            color: #15803d;
        }

        .success-message {
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error-message {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .button-row {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-save {
            border: none;
            background: #16a34a;
            color: white;
            padding: 13px 22px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #15803d;
        }

        .btn-cancel {
            text-decoration: none;
            background: #f3f4f6;
            color: #374151;
            padding: 13px 22px;
            border-radius: 10px;
            font-weight: 700;
        }

        .info-box {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            border-radius: 12px;
            padding: 16px;
            line-height: 1.6;
        }

        @media (max-width: 800px) {
            .salary-grid {
                grid-template-columns: 1fr;
            }

            .income-content {
                padding: 20px;
            }

            .income-summary {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
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
                <div class="jb-logo-subtitle">Smart Money Tracker</div>
            </div>
        </div>

        <nav class="jb-nav">

            <a href="{{ route('dashboard') }}">
                <span class="jb-nav-icon">🏠</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('income.index') }}" class="active">
                <span class="jb-nav-icon">💰</span>
                <span>Income</span>
            </a>

            <a href="{{ route('expense.index') }}">
                <span class="jb-nav-icon">💸</span>
                <span>Expenses</span>
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


    <!-- MAIN -->
    <main class="jb-main income-page">

        <div class="income-content">

            <div class="income-header">
                <h1>Salary & Payday Setup</h1>

                <p>
                    Set your salary dates and the amount you receive.
                    You can use one or two paydays.
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

                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif


            <!-- MONTHLY INCOME -->
            <div class="income-summary">

                <div class="income-summary-label">
                    Expected Monthly Income
                </div>

                <div class="income-summary-value">
                    ₱<span id="monthlyIncome">
                        {{ number_format($monthlyIncome, 2) }}
                    </span>
                </div>

            </div>


            <!-- FORM -->
            <form action="{{ route('income.store') }}" method="POST">

                @csrf

                <div class="income-card">

                    <h2>Salary Schedule</h2>

                    <div class="income-card-description">
                        Choose your payday using the calendar.
                        Both payday schedules are optional.
                    </div>


                    <div class="salary-grid">


                        <!-- FIRST PAYDAY -->
                        <div class="salary-box">

                            <h3>First Payday</h3>

                            <div class="form-group">

                                <label for="first_payday">
                                    Payday Date
                                    <span class="optional">(Optional)</span>
                                </label>

                                <input
                                    type="date"
                                    id="first_payday"
                                    name="first_payday"
                                    class="form-control"
                                    value="{{ old('first_payday', $firstPayday ? $firstPayday->income_date : '') }}"
                                    onchange="calculateIncome()"
                                >

                            </div>


                            <div class="form-group">

                                <label for="first_amount">
                                    Salary Amount
                                    <span class="optional">(Optional)</span>
                                </label>

                                <input
                                    type="number"
                                    id="first_amount"
                                    name="first_amount"
                                    class="form-control"
                                    min="0"
                                    step="0.01"
                                    placeholder="e.g. 12000"
                                    value="{{ old('first_amount', $firstPayday ? $firstPayday->amount : '') }}"
                                    oninput="calculateIncome()"
                                >

                            </div>

                        </div>


                        <!-- SECOND PAYDAY -->
                        <div class="salary-box">

                            <h3>Second Payday</h3>

                            <div class="form-group">

                                <label for="second_payday">
                                    Payday Date
                                    <span class="optional">(Optional)</span>
                                </label>

                                <input
                                    type="date"
                                    id="second_payday"
                                    name="second_payday"
                                    class="form-control"
                                    value="{{ old('second_payday', $secondPayday ? $secondPayday->income_date : '') }}"
                                    onchange="calculateIncome()"
                                >

                            </div>


                            <div class="form-group">

                                <label for="second_amount">
                                    Salary Amount
                                    <span class="optional">(Optional)</span>
                                </label>

                                <input
                                    type="number"
                                    id="second_amount"
                                    name="second_amount"
                                    class="form-control"
                                    min="0"
                                    step="0.01"
                                    placeholder="e.g. 18000"
                                    value="{{ old('second_amount', $secondPayday ? $secondPayday->amount : '') }}"
                                    oninput="calculateIncome()"
                                >

                            </div>

                        </div>

                    </div>


                    <!-- BUTTONS -->
                    <div class="button-row">

                        <button type="submit" class="btn-save">
                            💾 Save Salary Settings
                        </button>

                        <a href="{{ route('dashboard') }}" class="btn-cancel">
                            Cancel
                        </a>

                    </div>

                </div>

            </form>


          

            </div>

        </div>

    </main>

</div>


<script>

function calculateIncome() {

    let firstAmount =
        parseFloat(document.getElementById('first_amount').value) || 0;

    let secondAmount =
        parseFloat(document.getElementById('second_amount').value) || 0;

    let total =
        firstAmount + secondAmount;

    document.getElementById('monthlyIncome').innerText =
        total.toLocaleString('en-PH', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
}

calculateIncome();

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