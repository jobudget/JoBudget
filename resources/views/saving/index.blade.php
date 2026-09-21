<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Savings - JoBudget</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* =====================================================
           JO BUDGET LAYOUT
        ===================================================== */

        .jb-layout {
            display: flex;
            min-height: 100vh;
            background: #f8fafc;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .jb-sidebar {
            width: 240px;
            flex-shrink: 0;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 25px 15px;

            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;

            z-index: 2000;

            overflow-y: auto;

            transition: left 0.25s ease;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .jb-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
        }

        .jb-logo-icon {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #dcfce7;
            border-radius: 12px;

            font-size: 25px;

            flex-shrink: 0;
        }

        .jb-logo-title {
            font-size: 20px;
            font-weight: 800;
            color: #1e293b;
        }

        .jb-logo-subtitle {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .jb-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .jb-nav a {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px 14px;

            border-radius: 10px;

            text-decoration: none;

            color: #64748b;

            font-size: 14px;
            font-weight: 600;

            transition: 0.2s ease;
        }

        .jb-nav a:hover {
            background: #f1f5f9;
            color: #1e293b;
        }

        .jb-nav a.active {
            background: #dcfce7;
            color: #15803d;
        }

        .jb-nav-icon {
            width: 24px;
            text-align: center;
            font-size: 18px;
            flex-shrink: 0;
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .jb-main {
            flex: 1;
            min-width: 0;

            margin-left: 240px;
        }


        /* =====================================================
           MOBILE HAMBURGER
        ===================================================== */

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
            color: #ffffff;

            font-size: 24px;

            cursor: pointer;

            z-index: 3000;

            box-shadow:
                0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .jb-mobile-menu:hover {
            background: #668b49;
        }


        /* =====================================================
           MOBILE OVERLAY
        ===================================================== */

        .jb-sidebar-overlay {
            display: none;

            position: fixed;

            inset: 0;

            background: rgba(0, 0, 0, 0.4);

            z-index: 1999;
        }

        .jb-sidebar-overlay.mobile-open {
            display: block;
        }


        /* =====================================================
           SAVINGS PAGE
        ===================================================== */

        .savings-page {
            min-height: 100vh;

            background: #f8fafc;

            padding: 40px 20px;
        }

        .savings-container {
            max-width: 1100px;

            margin: 0 auto;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .savings-header {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 20px;

            margin-bottom: 30px;
        }

        .savings-title {
            margin: 0;

            font-size: 32px;
            font-weight: 800;

            color: #1e293b;
        }

        .savings-subtitle {
            margin: 6px 0 0;

            color: #64748b;

            font-size: 15px;
        }

        .savings-add-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 12px 20px;

            border-radius: 10px;

            background: #16a34a;
            color: #ffffff;

            font-size: 14px;
            font-weight: 700;

            text-decoration: none;

            transition: 0.2s ease;

            box-shadow:
                0 4px 10px rgba(22, 163, 74, 0.18);
        }

        .savings-add-btn:hover {
            background: #15803d;

            transform: translateY(-1px);
        }


        /* =====================================================
           SUCCESS
        ===================================================== */

        .savings-success {
            margin-bottom: 20px;

            padding: 13px 16px;

            border-radius: 10px;

            background: #dcfce7;

            border: 1px solid #bbf7d0;

            color: #166534;

            font-size: 14px;

            font-weight: 600;
        }


        /* =====================================================
           TOTAL SAVINGS
        ===================================================== */

        .savings-total-card {
            display: flex;

            align-items: center;

            gap: 18px;

            padding: 25px;

            margin-bottom: 25px;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, 0.06);
        }

        .savings-card-icon {
            width: 60px;
            height: 60px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: #dcfce7;

            font-size: 30px;

            flex-shrink: 0;
        }

        .savings-total-label {
            margin: 0 0 4px;

            color: #64748b;

            font-size: 14px;
            font-weight: 600;
        }

        .savings-total-amount {
            margin: 0;

            color: #16a34a;

            font-size: 30px;
            font-weight: 800;
        }


        /* =====================================================
           HISTORY CARD
        ===================================================== */

        .savings-history-card {
            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, 0.06);

            overflow: hidden;
        }

        .savings-history-header {
            padding: 24px 25px;

            border-bottom: 1px solid #e2e8f0;
        }

        .savings-history-header h2 {
            margin: 0;

            color: #1e293b;

            font-size: 20px;
            font-weight: 750;
        }

        .savings-history-header p {
            margin: 5px 0 0;

            color: #64748b;

            font-size: 14px;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .savings-table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        .savings-table {
            width: 100%;

            border-collapse: collapse;
        }

        .savings-table thead {
            background: #f8fafc;
        }

        .savings-table th {
            padding: 15px 20px;

            text-align: left;

            color: #64748b;

            font-size: 12px;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.04em;

            border-bottom: 1px solid #e2e8f0;

            white-space: nowrap;
        }

        .savings-table td {
            padding: 17px 20px;

            color: #334155;

            font-size: 14px;

            border-bottom: 1px solid #f1f5f9;

            vertical-align: middle;
        }

        .savings-table tbody tr {
            transition: 0.15s ease;
        }

        .savings-table tbody tr:hover {
            background: #f8fafc;
        }

        .savings-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* =====================================================
           DESCRIPTION
        ===================================================== */

        .saving-description {
            display: flex;

            align-items: center;

            gap: 10px;

            font-weight: 600;

            color: #1e293b;
        }

        .saving-icon {
            width: 35px;
            height: 35px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: #fef3c7;

            font-size: 18px;

            flex-shrink: 0;
        }


        /* =====================================================
           AMOUNT
        ===================================================== */

        .saving-amount {
            color: #16a34a;

            font-weight: 750;

            white-space: nowrap;
        }


        /* =====================================================
           DATE
        ===================================================== */

        .saving-date {
            color: #64748b !important;

            white-space: nowrap;
        }


        /* =====================================================
           ACTIONS
        ===================================================== */

        .saving-actions {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .saving-edit {
            padding: 7px 12px;

            border-radius: 7px;

            background: #eff6ff;

            color: #2563eb;

            text-decoration: none;

            font-size: 13px;
            font-weight: 600;

            transition: 0.2s ease;
        }

        .saving-edit:hover {
            background: #dbeafe;
        }

        .saving-delete {
            padding: 7px 12px;

            border: none;

            border-radius: 7px;

            background: #fef2f2;

            color: #dc2626;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .saving-delete:hover {
            background: #fee2e2;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .savings-empty {
            padding: 60px 25px;

            text-align: center;
        }

        .savings-empty-icon {
            font-size: 55px;

            margin-bottom: 15px;
        }

        .savings-empty h3 {
            margin: 0;

            color: #1e293b;

            font-size: 20px;
            font-weight: 750;
        }

        .savings-empty p {
            margin: 8px 0 22px;

            color: #64748b;

            font-size: 14px;
        }

        .savings-empty-btn {
            display: inline-flex;

            padding: 11px 18px;

            border-radius: 9px;

            background: #16a34a;

            color: #ffffff;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;

            transition: 0.2s ease;
        }

        .savings-empty-btn:hover {
            background: #15803d;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 900px) {

            /* SHOW HAMBURGER */

            .jb-mobile-menu {
                display: flex;
            }


            /* HIDDEN SIDEBAR */

            .jb-sidebar {
                position: fixed;

                top: 0;
                left: -270px;

                width: 250px;

                height: 100vh;
                min-height: 100vh;

                padding: 25px 15px;

                z-index: 2000;

                overflow-y: auto;

                transition: left 0.25s ease;
            }


            /* OPEN SIDEBAR */

            .jb-sidebar.mobile-open {
                left: 0;
            }


            /* MAIN */

            .jb-main {
                margin-left: 0 !important;

                width: 100%;

                min-width: 0;

                padding: 0;
            }


            /* SAVINGS */

            .savings-page {
                padding: 80px 20px 30px;
            }


            /* KEEP SIDEBAR CONTENT */

            .jb-logo {
                justify-content: flex-start;

                padding: 5px 10px 30px;
            }

            .jb-logo > div:last-child {
                display: block;
            }

            .jb-nav a {
                justify-content: flex-start;

                padding: 12px 14px;
            }

            .jb-nav a span:last-child {
                display: inline;
            }


            /* HEADER */

            .savings-header {
                flex-direction: column;

                align-items: flex-start;
            }

            .savings-add-btn {
                width: 100%;
            }
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 600px) {

            .jb-mobile-menu {
                width: 43px;
                height: 43px;

                top: 12px;
                left: 12px;

                font-size: 22px;
            }


            .jb-sidebar {
                width: 250px;

                left: -270px;
            }

            .jb-sidebar.mobile-open {
                left: 0;
            }


            .savings-page {
                padding: 70px 12px 25px;
            }


            .savings-container {
                width: 100%;
            }


            .savings-title {
                font-size: 27px;
            }

            .savings-subtitle {
                font-size: 14px;
            }


            .savings-total-card {
                padding: 20px;
            }

            .savings-card-icon {
                width: 52px;
                height: 52px;

                font-size: 25px;
            }

            .savings-total-amount {
                font-size: 25px;
            }


            .savings-history-header {
                padding: 20px;
            }


            .savings-table {
                min-width: 700px;
            }


            .savings-table th,
            .savings-table td {
                padding: 13px 15px;
            }


            .saving-actions {
                flex-direction: column;

                align-items: flex-start;
            }
        }


        /* =====================================================
           VERY SMALL MOBILE
        ===================================================== */

        @media (max-width: 400px) {

            .jb-mobile-menu {
                width: 40px;
                height: 40px;

                top: 10px;
                left: 10px;
            }

            .savings-page {
                padding-left: 10px;
                padding-right: 10px;
            }

            .savings-total-card {
                gap: 12px;
            }

            .savings-total-amount {
                font-size: 22px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     MOBILE HAMBURGER
===================================================== -->

<button
    type="button"
    id="mobileMenuToggle"
    class="jb-mobile-menu"
    aria-label="Open navigation menu"
>
    ☰
</button>


<!-- =====================================================
     MOBILE OVERLAY
===================================================== -->

<div
    id="mobileSidebarOverlay"
    class="jb-sidebar-overlay"
></div>


<div class="jb-layout">


    <!-- =================================================
         SIDEBAR
    ================================================== -->

    <aside class="jb-sidebar">


        <!-- LOGO -->

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


        <!-- NAVIGATION -->

        <nav class="jb-nav">


            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}">

                <span class="jb-nav-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- INCOME -->

            <a href="{{ route('income.index') }}">

                <span class="jb-nav-icon">
                    💰
                </span>

                <span>
                    Income
                </span>

            </a>


            <!-- EXPENSES -->

            <a href="{{ route('expense.index') }}">

                <span class="jb-nav-icon">
                    💸
                </span>

                <span>
                    Expenses
                </span>

            </a>


            <!-- SAVINGS -->

            <a
                href="{{ route('saving.index') }}"
                class="active"
            >

                <span class="jb-nav-icon">
                    🐷
                </span>

                <span>
                    Savings
                </span>

            </a>


            <!-- GOALS -->

            <a href="{{ route('goal.index') }}">

                <span class="jb-nav-icon">
                    🎯
                </span>

                <span>
                    Goals
                </span>

            </a>


        </nav>

    </aside>


    <!-- =================================================
         MAIN CONTENT
    ================================================== -->

    <main class="jb-main">


        <div class="savings-page">


            <div class="savings-container">


                <!-- =================================================
                     HEADER
                ================================================== -->

                <div class="savings-header">


                    <div>

                        <h1 class="savings-title">
                            Savings
                        </h1>

                        <p class="savings-subtitle">
                            Manage your savings and build your financial future.
                        </p>

                    </div>


                    <a
                        href="{{ route('saving.create') }}"
                        class="savings-add-btn"
                    >
                        + Add Savings
                    </a>


                </div>


                <!-- =================================================
                     SUCCESS MESSAGE
                ================================================== -->

                @if(session('success'))

                    <div class="savings-success">

                        {{ session('success') }}

                    </div>

                @endif


                <!-- =================================================
                     TOTAL SAVINGS
                ================================================== -->

                <div class="savings-total-card">


                    <div class="savings-card-icon">
                        🐷
                    </div>


                    <div>

                        <p class="savings-total-label">
                            Total Savings
                        </p>

                        <h2 class="savings-total-amount">
                            ₱{{ number_format($totalSavings, 2) }}
                        </h2>

                    </div>


                </div>


                <!-- =================================================
                     SAVINGS HISTORY
                ================================================== -->

                <div class="savings-history-card">


                    <div class="savings-history-header">

                        <div>

                            <h2>
                                Savings History
                            </h2>

                            <p>
                                Your saved money records
                            </p>

                        </div>

                    </div>


                    @if($savings->count() > 0)


                        <div class="savings-table-wrapper">


                            <table class="savings-table">


                                <thead>

                                    <tr>

                                        <th>
                                            Description
                                        </th>

                                        <th>
                                            Amount
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


                                    @foreach($savings as $saving)


                                        <tr>


                                            <!-- DESCRIPTION -->

                                            <td>

                                                <div class="saving-description">

                                                    <span class="saving-icon">
                                                        💰
                                                    </span>

                                                    {{ $saving->name }}

                                                </div>

                                            </td>


                                            <!-- AMOUNT -->

                                            <td>

                                                <span class="saving-amount">

                                                    ₱{{ number_format($saving->amount, 2) }}

                                                </span>

                                            </td>


                                            <!-- DATE -->

                                            <td class="saving-date">

                                                {{ optional($saving->saving_date)->format('M d, Y') ?? $saving->created_at->format('M d, Y') }}

                                            </td>


                                            <!-- ACTIONS -->

                                            <td>

                                                <div class="saving-actions">


                                                    <a
                                                        href="{{ route('saving.edit', $saving) }}"
                                                        class="saving-edit"
                                                    >
                                                        Edit
                                                    </a>


                                                    <form
                                                        action="{{ route('saving.destroy', $saving) }}"
                                                        method="POST"
                                                    >

                                                        @csrf

                                                        @method('DELETE')


                                                        <button
                                                            type="submit"
                                                            class="saving-delete"
                                                            onclick="return confirm('Are you sure you want to delete this saving?')"
                                                        >
                                                            Delete
                                                        </button>


                                                    </form>


                                                </div>

                                            </td>


                                        </tr>


                                    @endforeach


                                </tbody>


                            </table>


                        </div>


                    @else


                        <!-- EMPTY STATE -->

                        <div class="savings-empty">


                            <div class="savings-empty-icon">
                                🐷
                            </div>


                            <h3>
                                No savings yet
                            </h3>


                            <p>
                                Start building your savings by adding your first entry.
                            </p>


                            <a
                                href="{{ route('saving.create') }}"
                                class="savings-empty-btn"
                            >
                                + Add Your First Saving
                            </a>


                        </div>


                    @endif


                </div>


            </div>


        </div>


    </main>


</div>


<!-- =====================================================
     MOBILE SIDEBAR JAVASCRIPT
===================================================== -->

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


    /* ==============================================
       OPEN SIDEBAR
    ============================================== */

    function openSidebar() {

        sidebar.classList.add('mobile-open');

        overlay.classList.add('mobile-open');

        menuButton.textContent = '✕';

        menuButton.setAttribute(
            'aria-label',
            'Close navigation menu'
        );

    }


    /* ==============================================
       CLOSE SIDEBAR
    ============================================== */

    function closeSidebar() {

        sidebar.classList.remove('mobile-open');

        overlay.classList.remove('mobile-open');

        menuButton.textContent = '☰';

        menuButton.setAttribute(
            'aria-label',
            'Open navigation menu'
        );

    }


    /* ==============================================
       HAMBURGER CLICK
    ============================================== */

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


    /* ==============================================
       OVERLAY CLICK
    ============================================== */

    overlay.addEventListener(
        'click',
        function () {

            closeSidebar();

        }
    );


    /* ==============================================
       CLOSE AFTER NAVIGATION
    ============================================== */

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


    /* ==============================================
       ESC KEY CLOSE
    ============================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                closeSidebar();

            }

        }
    );


});

</script>


</body>
</html>