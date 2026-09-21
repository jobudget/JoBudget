<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f8f5;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 50px;
            margin-bottom: 5px;
        }

        .brand-name {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }

        .tagline {
            margin-top: 6px;
            font-size: 14px;
            color: #888;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
            color: #444;
        }

        .form-input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ddd;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        .form-input:focus {
            border-color: #7aa35a;
            box-shadow: 0 0 0 3px rgba(122, 163, 90, 0.12);
        }

        .error-message {
            margin-top: 6px;
            font-size: 13px;
            color: #d9534f;
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #666;
            cursor: pointer;
        }

        .remember-checkbox {
            width: 16px;
            height: 16px;
            accent-color: #7aa35a;
        }

        .forgot-link {
            font-size: 13px;
            color: #7aa35a;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            border: none;
            padding: 14px;
            border-radius: 9px;
            background: #7aa35a;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-button:hover {
            background: #668c49;
        }

        .login-button:active {
            transform: scale(0.99);
        }

        .session-message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            background: #eef7e8;
            color: #5c7f42;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            .login-wrapper {
                padding: 15px;
            }

            .login-container {
                padding: 30px 22px;
                border-radius: 14px;
            }

            .brand-name {
                font-size: 25px;
            }

            .logo {
                font-size: 45px;
            }

            .remember-row {
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>

    <div class="login-wrapper">

        <div class="login-container">

            <!-- Logo -->
            <div class="logo-section">
                <img
    src="{{ asset('images/jobudget-logo.png') }}"
    alt="JoBudget Logo"
    class="logo-image"
>

                <h1 class="brand-name">
                    JoBudget
                </h1>

                <p class="tagline">
                    Smart Money Tracker
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-message">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                    </label>

                    <input
                        id="email"
                        class="form-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                    >

                    @if ($errors->get('email'))
                        <div class="error-message">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                </div>

                <!-- Password -->
                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    >

                    @if ($errors->get('password'))
                        <div class="error-message">
                            {{ $errors->first('password') }}
                        </div>
                    @endif

                </div>

                <!-- Remember + Forgot -->
                <div class="remember-row">

                    <label
                        for="remember_me"
                        class="remember-label"
                    >
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="remember-checkbox"
                            name="remember"
                        >

                        <span>
                            Remember me
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a
                            class="forgot-link"
                            href="{{ route('password.request') }}"
                        >
                            Forgot password?
                        </a>
                    @endif

                </div>

                <!-- Login Button -->
                <button
                    type="submit"
                    class="login-button"
                >
                    Log in
                </button>
<div class="register-section">
    <span>Don't have an account?</span>
    <a href="{{ route('register') }}" class="register-link">
        Create an account
    </a>
</div>
            </form>

        </div>

    </div>

