<?php

namespace App\Http\Controllers\Auth;

use App\Helper\CustomeClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('backend.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();
        $valid = $request->session()->regenerate();
        if($valid){
            CustomeClass::ActivityLoger(auth()->user()->id, 'User Login','Success','User Logged in ');
            return redirect()->intended(RouteServiceProvider::HOME)->with('message','Login Successfully');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user_id =auth()->user()->id;
        Auth::guard('web')->logout();
        CustomeClass::ActivityLoger( $user_id,'User Logout','Success','User Logout in Successfully');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('message','Logout Successfully');


    }
}
