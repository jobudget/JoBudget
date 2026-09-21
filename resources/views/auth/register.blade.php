<x-guest-layout>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f7f8f5;
}

.register-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.register-container {
    width: 100%;
    max-width: 420px;
    background: #ffffff;
    padding: 40px;
    border-radius: 18px;
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
}

.logo-section {
    text-align: center;
    margin-bottom: 28px;
}

.logo-image {
    width: 100px;
    height: 100px;
    object-fit: contain;
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
    margin-bottom: 18px;
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

.register-button {
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

.register-button:hover {
    background: #668c49;
}

.register-button:active {
    transform: scale(0.99);
}

.login-section {
    text-align: center;
    margin-top: 20px;
    font-size: 13px;
    color: #777;
}

.login-link {
    color: #7aa35a;
    font-weight: 600;
    text-decoration: none;
    margin-left: 4px;
}

.login-link:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .register-wrapper {
        padding: 15px;
    }

    .register-container {
        padding: 30px 22px;
        border-radius: 14px;
    }

    .brand-name {
        font-size: 25px;
    }

    .logo-image {
        width: 85px;
        height: 85px;
    }
}
</style>

<div class="register-wrapper">

    <div class="register-container">

        <!-- LOGO -->
        <div class="logo-section">

            <img
                src="{{ asset('images/jobudget-logo.png') }}"
                alt="JoBudget Logo"
                class="logo-image"
            >

            <h1 class="brand-name">JoBudget</h1>

            <p class="tagline">
                Create your account
            </p>

        </div>


        <!-- REGISTER FORM -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NAME -->
            <div class="form-group">

                <label
                    for="name"
                    class="form-label"
                >
                    Name
                </label>

                <input
                    id="name"
                    class="form-input"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Enter your name"
                >

                @if($errors->get('name'))
                    <div class="error-message">
                        {{ $errors->first('name') }}
                    </div>
                @endif

            </div>


            <!-- EMAIL -->
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
                    autocomplete="username"
                    placeholder="Enter your email"
                >

                @if($errors->get('email'))
                    <div class="error-message">
                        {{ $errors->first('email') }}
                    </div>
                @endif

            </div>


            <!-- PASSWORD -->
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
                    autocomplete="new-password"
                    placeholder="Create a password"
                >

                @if($errors->get('password'))
                    <div class="error-message">
                        {{ $errors->first('password') }}
                    </div>
                @endif

            </div>


            <!-- CONFIRM PASSWORD -->
            <div class="form-group">

                <label
                    for="password_confirmation"
                    class="form-label"
                >
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    class="form-input"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                >

                @if($errors->get('password_confirmation'))
                    <div class="error-message">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif

            </div>


            <!-- REGISTER BUTTON -->
            <button
                type="submit"
                class="register-button"
            >
                Create Account
            </button>

        </form>


        <!-- LOGIN LINK -->
        <div class="login-section">

            <span>
                Already have an account?
            </span>

            <a
                href="{{ route('login') }}"
                class="login-link"
            >
                Log in
            </a>

        </div>

    </div>

</div>

</x-guest-layout>