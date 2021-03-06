<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // SHOW ADMIN LOGIN FORM
    public function index()
    {
        // ADMIN FROM VIEW
        return view('admin.auth.login');
    }

    // LOGIN ADMIN TO DASHBOARD
    public function login(LoginRequest $request)
    {
        try {

            // REMEMBER ME CHECKBOX
            $rememberMe = $request->has('remember-me') ? true : false;

            // AUTHORIZED ADMIN GUARDED CHECK
            if (
                // auth()->guard('admin')->attempt([
                Auth::guard('admin')->attempt(
                    [
                        'email'     => $request->input('email'),        // ADMIN EMAIL
                        'password'  => $request->input('password')      // ADMIN PASSWORD
                    ],
                    $rememberMe
                )
            ) {
                // REDIRECT TO ADMIN DASHBOARD VIEW
                return redirect()->route('admin.dashboard');
            }

            // REDIRECT BACK TO LOGIN PAGE WITH ERROR MESSAGE
            return redirect()->back()->with([
                'error' => 'هناك خطأ ما بالبيانات'
            ]);
        } catch (\Throwable $th) {

            // REDIRECT TO ADMIN BACK WITH ERROR MESSAGE
            return redirect()->route('admin.dashboard')->with([
                'error' => 'حدث خطأ يرجي المحاوله لاحقا'
            ]);
        }
    }

    /**
     * Logout admin session.
     * 
     * @return view
     */
    public function logout()
    {
        // AUTHENTICATED ADMIN GUARD
        $guard = $this->getGuard();

        $guard->logout();

        // ADMIN LOGIN FORM VIEW
        return redirect(route('admin.login'));
    }

    /**
     * Get admin guard.
     * 
     * @return guard
     */
    private function getGuard()
    {
        // AUTHENTICATED ADMIN GUARD
        return Auth::guard('admin');
    }
}
