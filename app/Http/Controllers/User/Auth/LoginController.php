<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view()->exists('backend.user.auth.login') ? view('backend.user.auth.login') : abort(404);
    }
    public function processLogin(UserLoginRequest $request)
    {
        $credentials = $request->validated();
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::guard('web')->attempt($credentials, $remember_me)) {
            //check verify
            if (isCredentialVerified($request->input('email'))) {
                //check status
                if (isUserActive($request->input('email'))) {
                    return redirect(RouteServiceProvider::USER_HOME);
                } else {
                    Auth::guard('web')->logout();
                    $this->setErrorMessage('Your Status is Inactive.');
                    return back();
                }
            } else {
                Auth::guard('web')->logout();
                $this->setErrorMessage('Your Account is Not verified!');
                return back();
            }
        } else {
            $this->setErrorMessage('Credentials Not Match!');
            return back();
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->action([LoginController::class, 'showLoginForm'])->with('message', 'Log out!');
        //return redirect('/');
    }
}
