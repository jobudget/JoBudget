```php
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JoBudget - Salary & Payday Setup</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<div class="jb-layout">

    <aside class="jb-sidebar">

        <div class="jb-logo">
            <div class="jb-logo-icon">🐿️</div>

            <div>
                <div class="jb-logo-text">JoBudget</div>
                <span class="jb-logo-subtitle">
                    Small Steps, Big Dreams
                </span>
            </div>
        </div>

        <nav class="jb-nav">

            <a href="{{ route('dashboard') }}">
                <span class="jb-nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('income.index') }}" class="active">
                <span class="jb-nav-icon">💰</span>
                <span>Income</span>
            </a>

        </nav>

    </aside>


    <main class="jb-main">

        <div class="jb-container">

            <div class="jb-welcome">

                <h1>
                    💰 Salary & Payday Setup
                </h1>

                <p>
                    Set when you receive your salary and how much you receive.
                </p>

            </div>


            @if(session('success'))

                <div class="jb-card" style="
                    margin-bottom: 20px;
                    border-left: 5px solid #2e9b57;
                ">

                    <strong>✓ Success!</strong>

                    {{ session('success') }}

                </div>

            @endif


            @if($errors->any())

                <div class="jb-card" style="
                    margin-bottom: 20px;
                    border-left: 5px solid #d9534f;
                ">

                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            <!-- EXPECTED MONTHLY INCOME -->

            <div class="jb-card" style="
                margin-bottom: 20px;
                text-align: center;
                background: linear-gradient(135deg, #27864c, #3ca862);
                color: white;
            ">

                <div style="font-size: 14px; opacity: .9;">
                    Expected Monthly Income
                </div>

                <div
                    id="monthlyTotal"
                    style="
                        font-size: 36px;
                        font-weight: 800;
                        margin-top: 5px;
                    "
                >
                    ₱{{ number_format($monthlyIncome, 2) }}
                </div>

            </div>


            <form
                action="{{ route('income.store') }}"
                method="POST"
            >

                @csrf


                <div class="jb-content-grid">


                    <!-- FIRST PAYDAY -->

                    <div class="jb-card">

                        <div style="
                            display:flex;
                            align-items:center;
                            gap:12px;
                            margin-bottom:20px;
                        ">

                            <div style="font-size:32px;">
                                💵
                            </div>

                            <div>

                                <h2 style="margin:0;">
                                    First Payday
                                </h2>

                                <p style="
                                    margin:4px 0 0;
                                    color:#718078;
                                ">
                                    Example: 10th of every month
                                </p>

                            </div>

                        </div>


                        <div class="jb-form-group">

                            <label class="jb-form-label">
                                Payday
                            </label>

                            <div class="jb-payday-input">

                                <input
                                    type="number"
                                    name="first_payday"
                                    id="first_payday"
                                    class="jb-input"
                                    min="1"
                                    max="31"
                                    value="{{ old('first_payday', $firstPayday ? \Carbon\Carbon::parse($firstPayday->income_date)->day : '') }}"
                                    placeholder="10"
                                    required
                                >

                                <span>
                                    day of every month
                                </span>

                            </div>

                        </div>


                        <div class="jb-form-group">

                            <label class="jb-form-label">
                                Amount Received
                            </label>

                            <div class="jb-money-input">

                                <span>₱</span>

                                <input
                                    type="number"
                                    name="first_amount"
                                    id="first_amount"
                                    class="jb-input"
                                    min="0"
                                    step="0.01"
                                    value="{{ old('first_amount', $firstPayday?->amount ?? '') }}"
                                    placeholder="12000.00"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <!-- SECOND PAYDAY -->

                    <div class="jb-card">

                        <div style="
                            display:flex;
                            align-items:center;
                            gap:12px;
                            margin-bottom:20px;
                        ">

                            <div style="font-size:32px;">
                                💵
                            </div>

                            <div>

                                <h2 style="margin:0;">
                                    Second Payday
                                </h2>

                                <p style="
                                    margin:4px 0 0;
                                    color:#718078;
                                ">
                                    Example: 25th of every month
                                </p>

                            </div>

                        </div>


                        <div class="jb-form-group">

                            <label class="jb-form-label">
                                Payday
                            </label>

                            <div class="jb-payday-input">

                                <input
                                    type="number"
                                    name="second_payday"
                                    id="second_payday"
                                    class="jb-input"
                                    min="1"
                                    max="31"
                                    value="{{ old('second_payday', $secondPayday ? \Carbon\Carbon::parse($secondPayday->income_date)->day : '') }}"
                                    placeholder="25"
                                    required
                                >

                                <span>
                                    day of every month
                                </span>

                            </div>

                        </div>


                        <div class="jb-form-group">

                            <label class="jb-form-label">
                                Amount Received
                            </label>

                            <div class="jb-money-input">

                                <span>₱</span>

                                <input
                                    type="number"
                                    name="second_amount"
                                    id="second_amount"
                                    class="jb-input"
                                    min="0"
                                    step="0.01"
                                    value="{{ old('second_amount', $secondPayday?->amount ?? '') }}"
                                    placeholder="18000.00"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                </div>


                <!-- BUTTONS -->

                <div class="jb-form-buttons" style="
                    margin-top:25px;
                ">

                    <a
                        href="{{ route('dashboard') }}"
                        class="jb-btn jb-btn-secondary"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="jb-btn"
                    >
                        Save Salary Settings ✓
                    </button>

                </div>

            </form>


            <!-- INFORMATION -->

            <div class="jb-card" style="
                margin-top:25px;
                background:#f4faf6;
            ">

                <h3>
                    🐿️ How it works
                </h3>

                <p style="color:#66736b; line-height:1.6;">
                    Enter the days you normally receive your salary and
                    the amount you receive on each payday.
                    JoBudget will automatically calculate your expected
                    monthly income.
                </p>

                <p style="color:#66736b; line-height:1.6;">
                    Example:
                    <strong>₱12,000</strong> on the 10th +
                    <strong>₱18,000</strong> on the 25th =
                    <strong>₱30,000 expected monthly income.</strong>
                </p>

            </div>

        </div>

    </main>

</div>


<script>

    const firstAmount =
        document.getElementById('first_amount');

    const secondAmount =
        document.getElementById('second_amount');

    const monthlyTotal =
        document.getElementById('monthlyTotal');


    function updateMonthlyIncome() {

        const first =
            parseFloat(firstAmount.value) || 0;

        const second =
            parseFloat(secondAmount.value) || 0;

        const total =
            first + second;


        monthlyTotal.textContent =
            '₱' +
            total.toLocaleString('en-PH', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

    }


    firstAmount.addEventListener(
        'input',
        updateMonthlyIncome
    );


    secondAmount.addEventListener(
        'input',
        updateMonthlyIncome
    );


</script>

</body>
</html>
```
