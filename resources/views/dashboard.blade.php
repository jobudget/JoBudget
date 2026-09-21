<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>JoBudget - Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart.js Data Labels Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <style>

        /* =========================================
           LOGOUT
        ========================================= */

        .jb-logout-form {
            margin-top: 10px;
        }

        .jb-logout {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            border: none;
            background: transparent;
            padding: 12px 20px;
            text-align: left;
            font-size: 15px;
            cursor: pointer;
            color: #555;
            font-family: inherit;
        }

        .jb-logout:hover {
            background: #f5f5f5;
        }

        .jb-logout .jb-nav-icon {
            width: 22px;
            text-align: center;
        }


        /* =========================================
           DASHBOARD LOWER SECTION
        ========================================= */

        .jb-dashboard-lower {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            margin-top: 20px;
            align-items: stretch;
        }


        /* =========================================
           EXPENSE PIE CHART
        ========================================= */

        .jb-expense-chart-card {
            min-width: 0;
            position: relative;
            top: -180px;
        }

        .jb-expense-chart-wrapper {
            position: relative;
            width: 100%;
            height: 280px;
            max-width: 300px;
            margin: -10px auto 0;
        }

        .jb-expense-chart-wrapper canvas {
            width: 100% !important;
            height: 100% !important;
        }


        /* =========================================
           MONTHLY EXPENSE BAR GRAPH
        ========================================= */

        .jb-monthly-expense-card {
            width: 57%;
            max-width: 500px;
            min-width: 0;
            height: 366px;
            padding: 15px 8px;
            margin: -180px auto 0;
            transform: translateX(-150px);
            overflow: hidden;
        }

        .jb-monthly-expense-chart-wrapper {
            position: relative;
            width: 80%;
            max-width: 400px;
            height: 300px;
            margin: 0 auto;
        }

        .jb-monthly-expense-chart-wrapper canvas {
            width: 100% !important;
            height: 100% !important;
        }


        /* =========================================
           EMPTY CHART
        ========================================= */

        .jb-chart-empty {
            text-align: center;
            padding: 45px 20px;
        }

        .jb-chart-empty .jb-empty-mascot {
            font-size: 42px;
            margin-bottom: 8px;
        }

        .jb-chart-empty p {
            margin: 0;
            font-weight: 700;
            color: #475569;
        }

        .jb-chart-empty small {
            display: block;
            margin-top: 5px;
            color: #94a3b8;
        }


        /* =========================================
           MOBILE MENU
        ========================================= */

        .jb-mobile-menu {
            display: none;
        }

        .jb-sidebar-overlay {
            display: none;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {

            .jb-dashboard-lower {
                grid-template-columns: 1fr;
            }

            .jb-expense-chart-wrapper {
                max-width: 320px;
            }

        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 600px) {

            .jb-mobile-menu {
                display: flex;

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

                font-size: 24px;

                cursor: pointer;

                z-index: 2000;

                box-shadow:
                    0 3px 10px rgba(0, 0, 0, 0.15);
            }


            /* SIDEBAR */

            .jb-sidebar {

                display: block;

                position: fixed;

                top: 0;
                left: -260px;

                width: 245px;
                height: 100vh;

                z-index: 1999;

                transition:
                    left 0.25s ease;

                overflow-y: auto;
            }


            .jb-sidebar.mobile-open {
                left: 0;
            }


            /* OVERLAY */

            .jb-sidebar-overlay {

                display: none;

                position: fixed;

                inset: 0;

                background:
                    rgba(0, 0, 0, 0.4);

                z-index: 1998;
            }


            .jb-sidebar-overlay.mobile-open {
                display: block;
            }


            /* MAIN */

            .jb-main {

                margin-left: 0 !important;

                width: 100%;

                padding:
                    75px 12px 20px;
            }


            /* SHOW SIDEBAR CONTENT */

            .jb-sidebar .jb-logo-text,
            .jb-sidebar .jb-logo-subtitle,
            .jb-sidebar .jb-nav span,
            .jb-sidebar .jb-sidebar-quote {

                display: block;
            }


            .jb-sidebar .jb-logo {

                justify-content: flex-start;

                padding:
                    0 20px 25px;
            }


            .jb-sidebar .jb-nav a {

                justify-content: flex-start;

                padding:
                    14px 20px;
            }


            /* DASHBOARD CARDS */

            .jb-dashboard-grid {

                display: grid;

                grid-template-columns:
                    repeat(2, 1fr);

                gap: 10px;
            }


            .jb-summary-card {

                width: 100%;

                min-height: 115px;

                padding: 13px;
            }


            .jb-summary-icon {

                width: 36px;
                height: 36px;

                font-size: 17px;

                margin-bottom: 8px;
            }


            .jb-summary-label {
                font-size: 11px;
            }


            .jb-summary-value {
                font-size: 18px;
            }


            /* HEADER */

            .jb-header {

                display: flex;

                align-items: center;

                justify-content: flex-end;

                margin-bottom: 20px;
            }


            .jb-header-right {

                width: 100%;

                justify-content: flex-end;

                gap: 10px;
            }


            .jb-profile span {
                display: none;
            }


            /* WELCOME */

            .jb-welcome {
                margin-bottom: 18px;
            }


            .jb-welcome h1 {

                font-size: 24px;

                line-height: 1.3;
            }


            .jb-welcome p {
                font-size: 13px;
            }


            /* LOWER CHARTS */

            .jb-dashboard-lower {

                display: flex;

                flex-direction: column;

                gap: 15px;

                margin-top: 20px;
            }


            .jb-expense-chart-card {

                width: 100%;

                top: 0;

                margin: 0;
            }


            .jb-expense-chart-wrapper {

                width: 100%;

                max-width: 280px;

                height: 230px;

                margin: 0 auto;
            }


            .jb-monthly-expense-card {

                width: 100%;

                max-width: 100%;

                height: 310px;

                padding: 15px;

                margin: 0;

                transform: none;

                box-sizing: border-box;
            }


            .jb-monthly-expense-chart-wrapper {

                width: 100%;

                max-width: 100%;

                height: 245px;

                margin: 0 auto;
            }


            /* GOALS */

            .jb-content-grid {

                display: block;

                width: 100%;

                margin-top: 20px !important;
            }


            .jb-section-card {

                width: 100%;

                padding: 16px;
            }


            .jb-section-title h2 {
                font-size: 17px;
            }


            .jb-goal {

                gap: 9px;

                padding: 11px 0;
            }


            .jb-goal-icon {

                width: 38px;
                height: 38px;

                min-width: 38px;

                font-size: 18px;
            }


            .jb-goal-content {

                min-width: 0;

                flex: 1;
            }


            .jb-goal-name {
                font-size: 13px;
            }


            .jb-goal-amount {
                font-size: 10px;
            }


            .jb-goal-percent {
                font-size: 11px;
            }


            /* FOOTER */

            .jb-footer {

                text-align: center;

                padding:
                    20px 5px;

                font-size: 11px;
            }

        }


        /* =========================================
           SMALL MOBILE
        ========================================= */

        @media (max-width: 400px) {

            .jb-main {
                padding: 70px 10px 15px;
            }


            .jb-dashboard-grid {
                grid-template-columns: 1fr;
            }


            .jb-summary-card {
                min-height: 105px;
            }


            .jb-summary-value {
                font-size: 20px;
            }


            .jb-welcome h1 {
                font-size: 21px;
            }


            .jb-dark-mode-top,
            .jb-notification,
            .jb-avatar {

                width: 38px;
                height: 38px;
            }


            .jb-monthly-expense-card {
                height: 290px;
            }


            .jb-monthly-expense-chart-wrapper {
                height: 225px;
            }

        }


        /* =========================================
           DARK MODE
        ========================================= */

        body.dark-mode {
            background: #121714;
            color: #f1f5f2;
        }

        body.dark-mode .jb-main {
            background: #121714;
        }

        body.dark-mode .jb-sidebar {
            background: #181d19;
            border-color: #303831;
            color: #f1f5f2;
        }

        body.dark-mode .jb-nav a {
            color: #b8c1bb;
        }

        body.dark-mode .jb-nav a:hover,
        body.dark-mode .jb-nav a.active {
            background: #26392c;
            color: #8ee0aa;
        }

        body.dark-mode .jb-header-right {
            color: #f1f5f2;
        }

        body.dark-mode .jb-card,
        body.dark-mode .jb-summary-card,
        body.dark-mode .jb-mascot-card,
        body.dark-mode .jb-payday,
        body.dark-mode .jb-expense-chart-card,
        body.dark-mode .jb-monthly-expense-card {
            background: #1b211d;
            border-color: #303831;
            color: #f1f5f2;
        }

        body.dark-mode h1,
        body.dark-mode h2,
        body.dark-mode h3,
        body.dark-mode h4,
        body.dark-mode .jb-summary-label,
        body.dark-mode .jb-summary-value,
        body.dark-mode .jb-goal-name,
        body.dark-mode .jb-goal-amount {
            color: #f1f5f2;
        }

        body.dark-mode p,
        body.dark-mode .jb-view-all,
        body.dark-mode .jb-payday-label,
        body.dark-mode .jb-payday-days {
            color: #a5afa8;
        }

        body.dark-mode .jb-notification {
            background: #1b211d;
            border-color: #303831;
            color: #f1f5f2;
        }

        body.dark-mode .jb-profile {
            color: #f1f5f2;
        }

        body.dark-mode .jb-dark-mode-top {
            background: #1b211d;
            border-color: #303831;
            color: #f1f5f2;
        }

        body.dark-mode .jb-logout {
            color: #b8c1bb;
        }

        body.dark-mode .jb-logout:hover {
            background: #26392c;
            color: #8ee0aa;
        }

        body.dark-mode .jb-welcome h1 {
            color: #f1f5f2;
        }

        body.dark-mode .jb-welcome p {
            color: #a5afa8;
        }

        body.dark-mode .jb-chart-empty p {
            color: #d5ddd7;
        }

        body.dark-mode .jb-chart-empty small {
            color: #8d9991;
        }

        body.dark-mode .jb-footer {
            color: #8d9991;
        }

        body.dark-mode .jb-progress {
            background: #303831;
        }

    </style>

</head>


<body>

    <!-- =========================================
         MOBILE MENU BUTTON
    ========================================== -->

    <button
        type="button"
        id="mobileMenuToggle"
        class="jb-mobile-menu"
        aria-label="Open navigation menu"
    >
        ☰
    </button>


    <!-- MOBILE OVERLAY -->

    <div
        id="mobileSidebarOverlay"
        class="jb-sidebar-overlay"
    ></div>


    <div class="jb-layout">


        <!-- =========================================
             SIDEBAR
        ========================================== -->

        <aside class="jb-sidebar">


            <!-- LOGO -->

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


            <!-- NAVIGATION -->

            <nav class="jb-nav">

                <a
                    href="{{ route('dashboard') }}"
                    class="active"
                >
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


                <a href="{{ route('expense.index') }}">

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


                <a href="{{ route('goal.index') }}">

                    <span class="jb-nav-icon">
                        🎯
                    </span>

                    <span>
                        Goals
                    </span>

                </a>

            </nav>


            <!-- LOGOUT -->

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="jb-logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="jb-logout"
                >

                    <span class="jb-nav-icon">
                        🚪
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>


            <!-- SIDEBAR QUOTE -->

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


        <!-- =========================================
             MAIN
        ========================================== -->

        <main class="jb-main">

            <div class="jb-container">


                <!-- =========================================
                     HEADER
                ========================================== -->

                <header class="jb-header">

                    <div class="jb-header-right">


                        <!-- DARK MODE -->

                        <button
                            type="button"
                            id="darkModeToggle"
                            class="jb-dark-mode-top"
                            aria-label="Toggle dark mode"
                        >

                            <span id="darkModeIcon">
                                🌙
                            </span>

                        </button>


                        <!-- NOTIFICATION -->

                        <div class="jb-notification">
                            🔔
                        </div>


                        <!-- PROFILE -->

                        <div class="jb-profile">

                            <div class="jb-avatar">
                                👨🏻
                            </div>

                            <span>
                                {{ auth()->user()->name }}
                            </span>

                        </div>

                    </div>

                </header>


                <!-- =========================================
                     WELCOME
                ========================================== -->

                <section class="jb-welcome jb-animate">

                    <h1>
                        Good day, {{ auth()->user()->name }}! 🐿️
                    </h1>

                    <p>
                        Here's your financial overview for this month.
                    </p>

                </section>


                <!-- =========================================
                     TOP GRID
                ========================================== -->

                <section class="jb-top-grid">


                    <!-- SUMMARY CARDS -->

                    <div class="jb-dashboard-grid">


                        <!-- TOTAL INCOME -->

                        <div class="jb-card jb-summary-card">

                            <div class="jb-summary-icon jb-income">
                                💵
                            </div>

                            <div class="jb-summary-label">
                                Total Income
                            </div>

                            <div class="jb-summary-value">
                                ₱{{ number_format($totalIncome, 2) }}
                            </div>

                            <div class="jb-small-positive">
                                ↑ This month
                            </div>

                        </div>


                        <!-- TOTAL EXPENSES -->

                        <div class="jb-card jb-summary-card">

                            <div class="jb-summary-icon jb-expense">
                                💸
                            </div>

                            <div class="jb-summary-label">
                                Total Expenses
                            </div>

                            <div class="jb-summary-value">
                                ₱{{ number_format($totalExpenses, 2) }}
                            </div>

                            <div class="jb-small-negative">
                                ↓ This month
                            </div>

                        </div>


                        <!-- TOTAL SAVINGS -->

                        <div class="jb-card jb-summary-card">

                            <div class="jb-summary-icon jb-savings">
                                🐷
                            </div>

                            <div class="jb-summary-label">
                                Total Savings
                            </div>

                            <div class="jb-summary-value">
                                ₱{{ number_format($totalSavings, 2) }}
                            </div>

                            <div class="jb-small-positive">
                                ↑ Keep saving
                            </div>

                        </div>


                        <!-- REMAINING BALANCE -->

                        <div class="jb-card jb-summary-card">

                            <div class="jb-summary-icon jb-balance">
                                💎
                            </div>

                            <div class="jb-summary-label">
                                Remaining Balance
                            </div>

                            <div class="jb-summary-value">
                                ₱{{ number_format($balance, 2) }}
                            </div>

                            <div class="jb-small-positive">
                                ✦ Available
                            </div>

                        </div>

                    </div>


                    <!-- SQUIRREL + PAYDAY -->

                    <div>


                        <!-- SQUIRREL -->

                        <div class="jb-mascot-card">

                            <div class="jb-speech">

                                You're doing great!<br>

                                Keep going! 💚

                            </div>

                            <div class="jb-mascot">
                                🐿️
                            </div>

                        </div>


                        <!-- PAYDAY -->

                        <div class="jb-payday">

                            <div>

                                <div class="jb-payday-label">
                                    📅 DAYS UNTIL PAYDAY
                                </div>

                                <div class="jb-payday-date">

                                    {{ $daysUntilPayday }}

                                    {{ $daysUntilPayday == 1 ? 'day' : 'days' }}

                                </div>

                                <div class="jb-payday-days">

                                    {{ $nextPayday->format('F jS') }}

                                </div>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- =========================================
                     EXPENSE CHARTS
                ========================================== -->

                <section class="jb-dashboard-lower">


                    <!-- EXPENSE PIE -->

                    <div class="jb-card jb-section-card jb-expense-chart-card">

                        <div class="jb-section-title">

                            <h2>
                                💸 Expense Breakdown
                            </h2>

                            <span class="jb-view-all">
                                By Category
                            </span>

                        </div>


                        @php

                            $chartLabels =
                                $expenseChart['labels'] ?? [];

                            $chartData =
                                $expenseChart['data'] ?? [];

                        @endphp


                        @if(count($chartLabels) > 0)

                            <div class="jb-expense-chart-wrapper">

                                <canvas
                                    id="expensePieChart"
                                ></canvas>

                            </div>

                        @else

                            <div class="jb-chart-empty">

                                <div class="jb-empty-mascot">
                                    🐿️
                                </div>

                                <p>
                                    No expenses this month.
                                </p>

                                <small>
                                    Add expenses to see your spending breakdown.
                                </small>

                            </div>

                        @endif

                    </div>


                    <!-- MONTHLY EXPENSE -->

                    <div class="jb-card jb-section-card jb-monthly-expense-card">

                        <div class="jb-section-title">

                            <h2>
                                📊 Monthly Expenses
                            </h2>

                            <span class="jb-view-all">
                                By Month
                            </span>

                        </div>


                        @php

                            $monthlyLabels =
                                $monthlyExpenseChart['labels'] ?? [];

                            $monthlyData =
                                $monthlyExpenseChart['data'] ?? [];

                        @endphp


                        @if(count($monthlyLabels) > 0)

                            <div class="jb-monthly-expense-chart-wrapper">

                                <canvas
                                    id="monthlyExpenseChart"
                                ></canvas>

                            </div>

                        @else

                            <div class="jb-chart-empty">

                                <div class="jb-empty-mascot">
                                    🐿️
                                </div>

                                <p>
                                    No expense data yet.
                                </p>

                                <small>
                                    Add expenses to see your monthly spending.
                                </small>

                            </div>

                        @endif

                    </div>

                </section>


                <!-- =========================================
                     FINANCIAL GOALS
                ========================================== -->

                <section
                    class="jb-content-grid"
                    style="margin-top: -150px;"
                >

                    <div class="jb-card jb-section-card">

                        <div class="jb-section-title">

                            <h2>
                                🎯 Financial Goals
                            </h2>

                            <a
                                href="{{ route('goal.index') }}"
                                class="jb-view-all"
                            >
                                View All →
                            </a>

                        </div>


                        @if($goals->count() > 0)

                            @foreach($goals as $goal)

                                @php

                                    $target =
                                        (float) $goal->target_amount;

                                    $current =
                                        (float) $goal->current_amount;

                                    $percentage =
                                        $target > 0
                                            ? min(
                                                ($current / $target) * 100,
                                                100
                                            )
                                            : 0;

                                @endphp


                                <div class="jb-goal">


                                    <!-- ICON -->

                                    <div class="jb-goal-icon">
                                        🎯
                                    </div>


                                    <!-- CONTENT -->

                                    <div class="jb-goal-content">

                                        <div class="jb-goal-name">

                                            {{ $goal->name }}

                                        </div>


                                        <div class="jb-goal-amount">

                                            ₱{{ number_format($current, 2) }}

                                            /

                                            ₱{{ number_format($target, 2) }}

                                        </div>


                                        <div class="jb-progress">

                                            <div
                                                style="width: {{ $percentage }}%;"
                                            ></div>

                                        </div>

                                    </div>


                                    <!-- PERCENTAGE -->

                                    <span class="jb-goal-percent">

                                        {{ number_format($percentage, 0) }}%

                                    </span>

                                </div>

                            @endforeach


                        @else

                            <div class="jb-chart-empty">

                                <div class="jb-empty-mascot">
                                    🎯
                                </div>

                                <p>
                                    No financial goals yet.
                                </p>

                                <small>
                                    Create a goal to start tracking your progress.
                                </small>

                                <br>

                                <a
                                    href="{{ route('goal.create') }}"
                                    class="jb-view-all"
                                >
                                    + Create Goal
                                </a>

                            </div>

                        @endif

                    </div>

                </section>


                <!-- =========================================
                     FOOTER
                ========================================== -->

                <div class="jb-footer">

                    JoBudget ♥ &nbsp; Small Steps, Big Dreams

                </div>

            </div>

        </main>

    </div>


    <!-- =========================================
         EXPENSE PIE CHART
    ========================================== -->

    @if(count($chartLabels) > 0)

        <script>

            document.addEventListener(
                'DOMContentLoaded',
                function () {

                    const canvas =
                        document.getElementById(
                            'expensePieChart'
                        );

                    if (!canvas) {
                        return;
                    }


                    const expenseData =
                        @json([
                            'labels' => $chartLabels,
                            'data' => $chartData
                        ]);


                    const totalExpenses =
                        expenseData.data.reduce(
                            function (sum, value) {

                                return sum + Number(value);

                            },
                            0
                        );


                    new Chart(
                        canvas,
                        {

                            type: 'pie',

                            data: {

                                labels:
                                    expenseData.labels,

                                datasets: [{

                                    data:
                                        expenseData.data,

                                    borderWidth: 2

                                }]

                            },


                            plugins: [
                                ChartDataLabels
                            ],


                            options: {

                                responsive: true,

                                maintainAspectRatio: false,


                                plugins: {

                                    legend: {

                                        position: 'bottom',

                                        labels: {

                                            padding: 12,

                                            boxWidth: 12

                                        }

                                    },


                                    datalabels: {

                                        display:
                                            function (context) {

                                                const value =
                                                    Number(
                                                        context
                                                            .dataset
                                                            .data[
                                                                context.dataIndex
                                                            ]
                                                    );

                                                return value > 0;

                                            },


                                        formatter:
                                            function (value) {

                                                if (
                                                    totalExpenses <= 0
                                                ) {
                                                    return '';
                                                }

                                                const percentage =
                                                    (
                                                        Number(value)
                                                        /
                                                        totalExpenses
                                                    )
                                                    * 100;

                                                return (
                                                    percentage.toFixed(1)
                                                    + '%'
                                                );

                                            },


                                        color:
                                            '#ffffff',


                                        font: {

                                            weight: 'bold',

                                            size: 14

                                        },

                                        textAlign:
                                            'center'

                                    },


                                    tooltip: {

                                        callbacks: {

                                            label:
                                                function (context) {

                                                    const value =
                                                        Number(
                                                            context.raw
                                                        );

                                                    const percentage =
                                                        totalExpenses > 0
                                                            ? (
                                                                value
                                                                /
                                                                totalExpenses
                                                            )
                                                            * 100
                                                            : 0;

                                                    return (
                                                        context.label
                                                        + ': ₱'
                                                        + value.toLocaleString(
                                                            'en-PH',
                                                            {
                                                                minimumFractionDigits: 2,
                                                                maximumFractionDigits: 2
                                                            }
                                                        )
                                                        + ' ('
                                                        + percentage.toFixed(1)
                                                        + '%)'
                                                    );

                                                }

                                        }

                                    }

                                }

                            }

                        }
                    );

                }
            );

        </script>

    @endif


    <!-- =========================================
         MONTHLY EXPENSE BAR CHART
    ========================================== -->

    @if(count($monthlyLabels) > 0)

        <script>

            document.addEventListener(
                'DOMContentLoaded',
                function () {

                    const canvas =
                        document.getElementById(
                            'monthlyExpenseChart'
                        );

                    if (!canvas) {
                        return;
                    }


                    const monthlyExpenseData =
                        @json([
                            'labels' => $monthlyLabels,
                            'data' => $monthlyData
                        ]);


                    new Chart(
                        canvas,
                        {

                            type: 'bar',

                            data: {

                                labels:
                                    monthlyExpenseData.labels,

                                datasets: [{

                                    label:
                                        'Monthly Expenses',

                                    data:
                                        monthlyExpenseData.data,

                                    borderWidth: 1,

                                    borderRadius: 8

                                }]

                            },


                            options: {

                                responsive: true,

                                maintainAspectRatio: false,


                                plugins: {

                                    legend: {

                                        display: false

                                    },


                                    tooltip: {

                                        callbacks: {

                                            label:
                                                function (context) {

                                                    const value =
                                                        context.raw;

                                                    return (
                                                        ' ₱'
                                                        +
                                                        Number(value)
                                                            .toLocaleString(
                                                                'en-PH',
                                                                {
                                                                    minimumFractionDigits: 2,
                                                                    maximumFractionDigits: 2
                                                                }
                                                            )
                                                    );

                                                }

                                        }

                                    }

                                },


                                scales: {

                                    x: {

                                        grid: {

                                            display: false

                                        }

                                    },


                                    y: {

                                        beginAtZero: true,

                                        ticks: {

                                            callback:
                                                function (value) {

                                                    return (
                                                        '₱'
                                                        +
                                                        Number(value)
                                                            .toLocaleString(
                                                                'en-PH'
                                                            )
                                                    );

                                                }

                                        }

                                    }

                                }

                            }

                        }
                    );

                }
            );

        </script>

    @endif


    <!-- =========================================
         DARK MODE
    ========================================== -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {

                const button =
                    document.getElementById(
                        'darkModeToggle'
                    );

                const icon =
                    document.getElementById(
                        'darkModeIcon'
                    );


                if (!button) {
                    return;
                }


                function updateDarkMode() {

                    if (
                        document.body.classList.contains(
                            'dark-mode'
                        )
                    ) {

                        icon.textContent = '☀️';

                    } else {

                        icon.textContent = '🌙';

                    }

                }


                if (
                    localStorage.getItem(
                        'jobudget-dark-mode'
                    ) === 'enabled'
                ) {

                    document.body.classList.add(
                        'dark-mode'
                    );

                }


                updateDarkMode();


                button.addEventListener(
                    'click',
                    function () {

                        document.body.classList.toggle(
                            'dark-mode'
                        );


                        localStorage.setItem(

                            'jobudget-dark-mode',

                            document.body.classList.contains(
                                'dark-mode'
                            )
                                ? 'enabled'
                                : 'disabled'

                        );


                        updateDarkMode();

                    }
                );

            }
        );

    </script>


    <!-- =========================================
         MOBILE SIDEBAR
    ========================================== -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {

                const menuButton =
                    document.getElementById(
                        'mobileMenuToggle'
                    );

                const sidebar =
                    document.querySelector(
                        '.jb-sidebar'
                    );

                const overlay =
                    document.getElementById(
                        'mobileSidebarOverlay'
                    );


                if (
                    !menuButton ||
                    !sidebar ||
                    !overlay
                ) {
                    return;
                }


                function openSidebar() {

                    sidebar.classList.add(
                        'mobile-open'
                    );

                    overlay.classList.add(
                        'mobile-open'
                    );

                    menuButton.textContent = '✕';

                    menuButton.setAttribute(
                        'aria-label',
                        'Close navigation menu'
                    );

                }


                function closeSidebar() {

                    sidebar.classList.remove(
                        'mobile-open'
                    );

                    overlay.classList.remove(
                        'mobile-open'
                    );

                    menuButton.textContent = '☰';

                    menuButton.setAttribute(
                        'aria-label',
                        'Open navigation menu'
                    );

                }


                menuButton.addEventListener(
                    'click',
                    function () {

                        if (
                            sidebar.classList.contains(
                                'mobile-open'
                            )
                        ) {

                            closeSidebar();

                        } else {

                            openSidebar();

                        }

                    }
                );


                overlay.addEventListener(
                    'click',
                    function () {

                        closeSidebar();

                    }
                );


                /* Close menu after clicking a navigation link */

                sidebar
                    .querySelectorAll('.jb-nav a')
                    .forEach(function (link) {

                        link.addEventListener(
                            'click',
                            function () {

                                closeSidebar();

                            }
                        );

                    });

            }
        );

    </script>


</body>

</html>