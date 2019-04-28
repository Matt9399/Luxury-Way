<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CollabLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:collab', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.collab-login');
    }

    public function login(Request $request)
    {
        // validate the form
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        // attempt to log the user in
        if (Auth::guard('collab')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // if successful, then redirect
            return redirect()->intended(route('collab.dashboard'));
        }
        // if unsuccessful, redirect back
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('collab')->logout();
        return redirect('/');
    }
}
