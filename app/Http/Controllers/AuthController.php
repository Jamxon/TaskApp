<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    // Register function
    public function register(Request $request)
    {
        // Validatsiya qiling
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:15|unique:users',
        ]);

        // Foydalanuvchini yaratish
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        // Foydalanuvchini avtomatik tizimga kiritish
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Ro\'yxatdan o\'tish muvaffaqiyatli bo\'ldi. Endi tizimga kiring.');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Login function
    public function login(Request $request)
    {
        // Validatsiya qiling
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Kirish ma'lumotlarini tekshirish
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('tasks.index');
        } else {
            return response()->json(['message' => 'Login yoki parol noto‘g‘ri.'], 401);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Sessiyani tozalash
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'You have been logged out.');
    }
}
