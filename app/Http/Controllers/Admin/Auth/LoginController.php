<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Admin\Auth\LoginController;

class LoginController extends Controller
{
    public function showLoginForm()
    {
      return view()->exists('backend.admin.auth.login') ? view('backend.admin.auth.login') : abort(404);
    }
    public function processLogin(AdminLoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }else{
            return back()->with('error','Password Error!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->action([LoginController::class, 'showLoginForm'])->with('message', 'Log out!');
    }
}
