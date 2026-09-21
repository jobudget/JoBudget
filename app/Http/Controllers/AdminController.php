<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (
            $credentials['email'] === env('ADMIN_EMAIL') &&
            $credentials['password'] === env('ADMIN_PASSWORD')
        ) {
            session([
                'admin_authenticated' => true,
                'admin_email' => $credentials['email'],
            ]);

            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid admin email or password.',
            ])
            ->withInput($request->only('email'));
    }

    public function dashboard()
    {
        if (!session('admin_authenticated')) {
            return redirect()->route('admin.login');
        }

        $users = User::select(
            'id',
            'name',
            'email',
            'created_at'
        )
        ->orderByDesc('created_at')
        ->get();

        return view('admin.dashboard', compact('users'));
    }

    public function logout()
    {
        session()->forget([
            'admin_authenticated',
            'admin_email',
        ]);

        return redirect()->route('admin.login');
    }
}