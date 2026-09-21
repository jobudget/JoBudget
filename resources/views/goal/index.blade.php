<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JoBudget - Goals</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* =========================================
           GOALS PAGE
        ========================================= */

        .goal-page {
            min-height: 100vh;
            background: #f8faf7;
        }

        .goal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .goal-title h1 {
            margin: 0;
            font-size: 28px;
            color: #1f2937;
        }

        .goal-title p {
            margin: 6px 0 0;
            color: #7b8794;
        }

        .goal-create-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            background: #2f9e62;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .goal-create-btn:hover {
            background: #217747;
            transform: translateY(-1px);
        }

        /* =========================================
           GOAL GRID
        ========================================= */

        .goal-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .goal-card {
            background: #ffffff;
            border: 1px solid #edf0ed;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 8px 30px rgba(30, 60, 45, .07);
        }

        .goal-card-top {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .goal-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            background: #e8f7ed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            flex-shrink: 0;
        }

        .goal-card-title {
            flex: 1;
        }

        .goal-card-title h2 {
            margin: 0;
            font-size: 18px;
            color: #1f2937;
        }

        .goal-card-title span {
            display: block;
            margin-top: 4px;
            font-size: 13px;
            color: #7b8794;
        }

        .goal-amount {
            margin-top: 22px;
        }

        .goal-current {
            font-size: 24px;
            font-weight: 800;
            color: #2f9e62;
        }

        .goal-target {
            font-size: 14px;
            color: #7b8794;
        }

        .goal-progress-container {
            margin-top: 14px;
        }

        .goal-progress-bar {
            width: 100%;
            height: 10px;
            background: #edf0ed;
            border-radius: 20px;
            overflow: hidden;
        }

        .goal-progress-fill {
            height: 100%;
            background: #2f9e62;
            border-radius: 20px;
            transition: width 0.3s ease;
        }

        .goal-progress-info {
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-size: 13px;
            color: #7b8794;
        }

        .goal-percent {
            font-weight: 700;
            color: #2f9e62;
        }

        .goal-description {
            margin-top: 18px;
            padding: 12px;
            background: #f8faf7;
            border-radius: 10px;
            font-size: 13px;
            color: #667085;
        }

        .goal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .goal-edit-btn,
        .goal-delete-btn {
            border: none;
            padding: 9px 14px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
        }

        .goal-edit-btn {
            background: #e8f7ed;
            color: #217747;
        }

        .goal-delete-btn {
            background: #fff0f0;
            color: #d9534f;
        }

        .goal-delete-btn:hover {
            background: #ffe0e0;
        }

        /* =========================================
           EMPTY STATE
        ========================================= */

        .goal-empty {
            background: #ffffff;
            border: 1px solid #edf0ed;
            border-radius: 20px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(30, 60, 45, .07);
        }

        .goal-empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .goal-empty h2 {
            margin: 0;
            color: #1f2937;
        }

        .goal-empty p {
            color: #7b8794;
            margin: 8px 0 20px;
        }

        /* =========================================
           SUCCESS MESSAGE
        ========================================= */

        .goal-success {
            background: #e8f7ed;
            color: #217747;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 800px) {

            .goal-grid {
                grid-template-columns: 1fr;
            }

            .goal-header {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

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


            <!-- GOALS -->

            <a
                href="{{ route('goal.index') }}"
                class="active"
            >

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

           

            </button>

        </form>


        <!-- QUOTE -->

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

        <div class="jb-container goal-page">

            <!-- HEADER -->

            <div class="goal-header">

                <div class="goal-title">

                    <h1>
                        🎯 Financial Goals
                    </h1>

                    <p>
                        Track your progress and turn your plans into achievements.
                    </p>

                </div>


            

            </div>


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div class="goal-success">

                    {{ session('success') }}

                </div>

            @endif


            <!-- =========================================
                 GOALS
            ========================================== -->

            @if($goals->count() > 0)

                <div class="goal-grid">

                    @foreach($goals as $goal)

                        @php

                            $target = (float) $goal->target_amount;

                            $current = (float) $goal->current_amount;

                            $percentage = $target > 0
                                ? min(($current / $target) * 100, 100)
                                : 0;

                        @endphp


                        <div class="goal-card">

                            <div class="goal-card-top">

                                <div class="goal-icon">
                                    🎯
                                </div>

                                <div class="goal-card-title">

                                    <h2>
                                        {{ $goal->name }}
                                    </h2>

                                    @if($goal->target_date)

                                        <span>
                                            Target:
                                            {{ $goal->target_date->format('F j, Y') }}
                                        </span>

                                    @else

                                        <span>
                                            No target date
                                        </span>

                                    @endif

                                </div>

                            </div>


                            <!-- AMOUNT -->

                            <div class="goal-amount">

                                <span class="goal-current">

                                    ₱{{ number_format($current, 2) }}

                                </span>

                                <span class="goal-target">

                                    / ₱{{ number_format($target, 2) }}

                                </span>

                            </div>


                            <!-- PROGRESS -->

                            <div class="goal-progress-container">

                                <div class="goal-progress-bar">

                                    <div
                                        class="goal-progress-fill"
                                        style="width: {{ $percentage }}%;"
                                    ></div>

                                </div>


                                <div class="goal-progress-info">

                                    <span>
                                        Progress
                                    </span>

                                    <span class="goal-percent">
                                        {{ number_format($percentage, 1) }}%
                                    </span>

                                </div>

                            </div>


                            <!-- DESCRIPTION -->

                            @if($goal->description)

                                <div class="goal-description">

                                    {{ $goal->description }}

                                </div>

                            @endif


                            <!-- ACTIONS -->

                            <div class="goal-actions">

                                <a
                                    href="{{ route('goal.edit', $goal) }}"
                                    class="goal-edit-btn"
                                >
                                    ✏️ Edit
                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('goal.destroy', $goal) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this goal?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="goal-delete-btn"
                                    >
                                        🗑️ Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <!-- EMPTY STATE -->

                <div class="goal-empty">

                    <div class="goal-empty-icon">
                        🎯
                    </div>

                    <h2>
                        No goals yet
                    </h2>

                    <p>
                        Create your first financial goal and start tracking your progress.
                    </p>

                    <a
                        href="{{ route('goal.create') }}"
                        class="goal-create-btn"
                    >
                        ＋ Create Your First Goal
                    </a>

                </div>

            @endif

        </div>

    </main>

</div>

</body>

</html>