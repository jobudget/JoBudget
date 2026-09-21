<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Savings - JoBudget</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    /* ================================
       JO BUDGET LAYOUT
    ================================= */

    .jb-layout {
        display: flex;
        min-height: 100vh;
        background: #f8fafc;
    }

    .jb-sidebar {
        width: 240px;
        flex-shrink: 0;
        background: #ffffff;
        border-right: 1px solid #e2e8f0;
        padding: 25px 15px;
    }

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
    }

    .jb-main {
        flex: 1;
        min-width: 0;
    }


    /* ================================
       SAVINGS PAGE
    ================================= */

    .savings-page {
        min-height: 100vh;
        background: #f8fafc;
        padding: 40px 20px;
    }

    .savings-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    /* HEADER */

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
        color: white;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s ease;
        box-shadow: 0 4px 10px rgba(22, 163, 74, 0.18);
    }

    .savings-add-btn:hover {
        background: #15803d;
        transform: translateY(-1px);
    }

    /* SUCCESS */

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

    /* TOTAL SAVINGS */

    .savings-total-card {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 25px;
        margin-bottom: 25px;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
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

    /* HISTORY CARD */

    .savings-history-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
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

    /* TABLE */

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

    /* DESCRIPTION */

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
    }

    /* AMOUNT */

    .saving-amount {
        color: #16a34a;
        font-weight: 750;
        white-space: nowrap;
    }

    /* DATE */

    .saving-date {
        color: #64748b !important;
        white-space: nowrap;
    }

    /* ACTIONS */

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

    /* EMPTY STATE */

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
        color: white;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        transition: 0.2s ease;
    }

    .savings-empty-btn:hover {
        background: #15803d;
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .jb-sidebar {
            width: 200px;
        }

        .savings-page {
            padding: 25px 15px;
        }

        .savings-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .savings-title {
            font-size: 27px;
        }

        .savings-add-btn {
            width: 100%;
        }

        .savings-total-card {
            padding: 20px;
        }

        .savings-total-amount {
            font-size: 25px;
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

    @media (max-width: 600px) {

        .jb-sidebar {
            width: 75px;
            padding: 20px 8px;
        }

        .jb-logo {
            justify-content: center;
            padding: 5px 0 25px;
        }

        .jb-logo > div:last-child {
            display: none;
        }

        .jb-nav a {
            justify-content: center;
            padding: 12px 5px;
        }

        .jb-nav a span:last-child {
            display: none;
        }

        .jb-nav-icon {
            font-size: 20px;
        }
    }
</style>


<div class="jb-layout">

    <!-- SIDEBAR -->
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

            <!-- DASHBOARD -->
            <a href="{{ route('dashboard') }}">
                <span class="jb-nav-icon">🏠</span>
                <span>Dashboard</span>
            </a>


            <!-- INCOME -->
            <a href="{{ route('income.index') }}">
                <span class="jb-nav-icon">💰</span>
                <span>Income</span>
            </a>


            <!-- EXPENSES -->
            <a href="{{ route('expense.index') }}">
                <span class="jb-nav-icon">💸</span>
                <span>Expenses</span>
            </a>


            <!-- SAVINGS -->
            <a href="{{ route('saving.index') }}" class="active">
                <span class="jb-nav-icon">🐷</span>
                <span>Savings</span>
            </a>


        

        </nav>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="jb-main">

        <div class="savings-page">

            <div class="savings-container">

                {{-- HEADER --}}
                <div class="savings-header">

                    <div>
                        <h1 class="savings-title">
                            Savings
                        </h1>

                        <p class="savings-subtitle">
                            Manage your savings and build your financial future.
                        </p>
                    </div>

                    <a href="{{ route('saving.create') }}"
                       class="savings-add-btn">
                        + Add Savings
                    </a>

                </div>


                {{-- SUCCESS MESSAGE --}}
                @if(session('success'))

                    <div class="savings-success">
                        {{ session('success') }}
                    </div>

                @endif


                {{-- TOTAL SAVINGS --}}
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


                {{-- SAVINGS HISTORY --}}
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
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach($savings as $saving)

                                        <tr>

                                            <td>

                                                <div class="saving-description">

                                                    <span class="saving-icon">
                                                        💰
                                                    </span>

                                                    {{ $saving->description }}

                                                </div>

                                            </td>


                                            <td>

                                                <span class="saving-amount">
                                                    ₱{{ number_format($saving->amount, 2) }}
                                                </span>

                                            </td>


                                            <td class="saving-date">

                                                {{ $saving->created_at->format('M d, Y') }}

                                            </td>


                                            <td>

                                                <div class="saving-actions">

                                                    <a
                                                        href="{{ route('saving.edit', $saving) }}"
                                                        class="saving-edit">
                                                        Edit
                                                    </a>


                                                    <form
                                                        action="{{ route('saving.destroy', $saving) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="saving-delete"
                                                            onclick="return confirm('Are you sure you want to delete this saving?')">

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
                                class="savings-empty-btn">

                                + Add Your First Saving

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </main>

</div>
