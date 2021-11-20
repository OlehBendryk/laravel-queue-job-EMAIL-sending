<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)){
            return view('admin.index');
        } else {
            return redirect()->route('login')
                ->with('error', 'Such user not found. Check your email or password!');
        }
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }

    public function credentials(Request $request)
    {
        return ['email' => $request->email, 'password' => $request->password];
    }

    protected function attemptLogin(Request $request)
    {
        $data = $this->credentials($request);

        $ifExist = User::where('email', $data['email'])->where('password', $data['password'])->first();

        if ($ifExist) {
            return true;
        }

        return false;
    }

}

