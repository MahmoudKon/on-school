<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends BackEndController
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    } // End Construct Method

    public function viewLogin()
    {
        return view('dashboard.login.index');
    } // End View Login Form

    public function field()
    {
        if(filter_var(request()->username, FILTER_VALIDATE_EMAIL))
            return 'email';

        if(is_numeric(request()->username))
            return 'phone';

        return 'name';
    } // End Check Field [ User Name || Phone || Email ]

    public function login(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::guard('admin')->attempt([$this->field() => $request->username, 'password' => $request->password], $remember_me)) {
            alert()->message(__('general.welcome_back') . ' <b>' . auth()->guard('admin')->user()->name . '</b>')->html();
            return redirect()->route('dashboard.home');
        } // end of check auth
        return redirect()->back()->withInput($request->only('username', 'remember_me'))->with(['error' => __('auth.failed')]);
    } // End Login Create Auth

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    } // End Logout Auth
} // End Login Controller
