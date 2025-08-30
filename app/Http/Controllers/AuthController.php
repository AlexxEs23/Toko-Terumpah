<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        $products = Produk::where('stock', '>', 0)->orderBy('created_at', 'desc')->get();
        return view('index', compact('products'));
    }
    public function register()
    {
        return view('auth.register');
    }
     function registerPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        

        return redirect()->route('index');
    }


    public function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $emailCheck = User::where('email', $request->email)->first();

        if(!$emailCheck){
            return back()->withErrors([
                'email' => 'Email not registered.',
            ]);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            if(Auth::user()->role === 'admin'){
                return redirect()->route('admin.dataProduct');
            } else {
                return redirect()->route('index');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    public function userLogout()
    {
        Auth::logout();
        
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect()->route('index')->with('success', 'You have been logged out successfully.');
    }

    public function dataUser()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.data_user', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting admin users
        if($user->role === 'admin') {
            return redirect()->route('admin.dataUser')->with('error', 'Admin user cannot be deleted.');
        }
        
        $user->delete();
        
        return redirect()->route('admin.dataUser')->with('success', 'User deleted successfully.');
    }

}