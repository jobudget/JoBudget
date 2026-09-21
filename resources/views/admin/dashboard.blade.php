<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard - JoBudget</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;

            font-family: Arial, sans-serif;

            background: #f7f8f5;

            color: #333;
        }

        .admin-header {
            background: #7aa35a;

            color: white;

            padding: 20px 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .admin-title {
            margin: 0;

            font-size: 24px;
        }

        .logout-button {
            border: none;

            background: white;

            color: #7aa35a;

            padding: 9px 16px;

            border-radius: 8px;

            font-weight: bold;

            cursor: pointer;
        }

        .logout-button:hover {
            background: #f1f1f1;
        }

        .admin-container {
            max-width: 1100px;

            margin: 30px auto;

            padding: 0 20px;
        }

        .welcome-card {
            background: white;

            padding: 25px;

            border-radius: 14px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.06);

            margin-bottom: 25px;
        }

        .welcome-card h2 {
            margin-top: 0;

            margin-bottom: 8px;
        }

        .welcome-card p {
            margin: 0;

            color: #777;
        }

        .users-card {
            background: white;

            border-radius: 14px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.06);

            overflow: hidden;
        }

        .users-header {
            padding: 20px 25px;

            border-bottom: 1px solid #eee;
        }

        .users-header h2 {
            margin: 0;

            font-size: 20px;
        }

        .user-count {
            margin-top: 5px;

            color: #888;

            font-size: 13px;
        }

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;
        }

        th {
            background: #f7f8f5;

            text-align: left;

            padding: 14px 20px;

            font-size: 13px;

            color: #666;
        }

        td {
            padding: 15px 20px;

            border-top: 1px solid #eee;

            font-size: 14px;
        }

        tr:hover td {
            background: #fafcf8;
        }

        .empty-message {
            padding: 30px;

            text-align: center;

            color: #888;
        }

        @media (max-width: 600px) {

            .admin-header {
                padding: 16px;
            }

            .admin-title {
                font-size: 20px;
            }

            .admin-container {
                margin: 20px auto;

                padding: 0 12px;
            }

            th,
            td {
                white-space: nowrap;
            }

        }

    </style>

</head>


<body>


    <!-- HEADER -->

    <header class="admin-header">

        <h1 class="admin-title">
            JoBudget Admin
        </h1>


        <form
            method="POST"
            action="{{ route('admin.logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="logout-button"
            >
                Logout
            </button>

        </form>

    </header>


    <!-- CONTENT -->

    <main class="admin-container">


        <!-- WELCOME -->

        <div class="welcome-card">

            <h2>
                Welcome, Administrator
            </h2>

            <p>
                Logged in as {{ session('admin_email') }}
            </p>

        </div>


        <!-- USERS -->

        <div class="users-card">

            <div class="users-header">

                <h2>
                    Registered Users
                </h2>

                <div class="user-count">

                    {{ $users->count() }}
                    {{ $users->count() == 1 ? 'user' : 'users' }}

                </div>

            </div>


            @if($users->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    #
                                </th>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Registered
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($users as $user)

                                <tr>

                                    <td>
                                        {{ $user->id }}
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user->created_at->format('M d, Y h:i A') }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-message">
                    No registered users found.
                </div>

            @endif


        </div>


    </main>


</body>

</html>