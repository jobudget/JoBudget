<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login - JoBudget</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;

            font-family: Arial, sans-serif;

            background: #f7f8f5;
        }

        .admin-wrapper {
            min-height: 100vh;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 20px;
        }

        .admin-container {
            width: 100%;

            max-width: 420px;

            background: white;

            padding: 40px;

            border-radius: 18px;

            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .admin-header {
            text-align: center;

            margin-bottom: 30px;
        }

        .admin-title {
            margin: 0;

            font-size: 28px;

            font-weight: bold;

            color: #333;
        }

        .admin-subtitle {
            margin-top: 8px;

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
        }

        .form-input:focus {
            border-color: #7aa35a;

            box-shadow:
                0 0 0 3px rgba(122, 163, 90, 0.12);
        }

        .admin-button {
            width: 100%;

            border: none;

            padding: 14px;

            border-radius: 9px;

            background: #7aa35a;

            color: white;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;
        }

        .admin-button:hover {
            background: #668c49;
        }

        .back-login {
            display: block;

            margin-top: 20px;

            text-align: center;

            color: #7aa35a;

            font-size: 13px;

            font-weight: 600;

            text-decoration: none;
        }

        .back-login:hover {
            text-decoration: underline;
        }

        .error-message {
            margin-bottom: 18px;

            padding: 12px 14px;

            border-radius: 8px;

            background: #ffe8e8;

            color: #c0392b;

            font-size: 13px;

            text-align: center;
        }

    </style>

</head>


<body>

    <div class="admin-wrapper">

        <div class="admin-container">

            <div class="admin-header">

                <h1 class="admin-title">
                    JoBudget Admin
                </h1>

                <p class="admin-subtitle">
                    Administrator Login
                </p>

            </div>


            @if($errors->any())

                <div class="error-message">
                    {{ $errors->first() }}
                </div>

            @endif


            <form
                method="POST"
                action="{{ route('admin.authenticate') }}"
            >

                @csrf


                <!-- Email -->

                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Admin Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-input"
                        placeholder="Enter admin email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >

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
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="Enter admin password"
                        required
                    >

                </div>


                <!-- Login Button -->

                <button
                    type="submit"
                    class="admin-button"
                >
                    Admin Login
                </button>

            </form>


            <!-- Back to User Login -->

            <a
                href="{{ route('login') }}"
                class="back-login"
            >
                ← Back to User Login
            </a>

        </div>

    </div>

</body>

</html>