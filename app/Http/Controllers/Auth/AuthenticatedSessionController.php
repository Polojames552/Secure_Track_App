<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // $request->session()->regenerate();
        // return redirect()->intended(RouteServiceProvider::HOME);
            if(Auth::user()->role =='1'){
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME1);
            }
            elseif(Auth::user()->role =='2'){
                if(Auth::user()->status =='Active'){
                    $request->session()->regenerate();
                    return redirect()->intended(RouteServiceProvider::HOME2);
                }else{
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->withErrors([
                        'email' => __('auth.blocked'),
                    ]);
                }
            }
            elseif(Auth::user()->role =='3'){
                if(Auth::user()->status =='Active'){
                    $request->session()->regenerate();
                    return redirect()->intended(RouteServiceProvider::HOME3);
                }
                else{
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->withErrors([
                        'email' => __('auth.blocked'),
                    ]);
                }
            }
            elseif(Auth::user()->role =='4'){
                if(Auth::user()->status =='Active'){
                    $request->session()->regenerate();
                    return redirect()->intended(RouteServiceProvider::HOME4);
                }
                else{
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->withErrors([
                        'email' => __('auth.blocked'),
                    ]);
                }
            }
            else{
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                // throw ValidationException::withMessages([
                //     'email' => __('auth.verify'),
                // ]);
                // $request->session()->flash('email_verification_message', 'No existing records');
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
