<?php

namespace App\Http\Controllers\User\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Notifications\UserEmailVerificationNotification;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view()->exists('backend.user.auth.registration') ? view('backend.user.auth.registration') : abort(404);
    }

    public function processRegistration(UserRegistrationRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->token = md5($request->input('email')) . uniqid();
            $user->role = $request->input('role');
            if($user->save()){
                $user->notify(new UserEmailVerificationNotification($user));
                $this->setSuccessMessage('Please verify your account!');
                return back();
            }
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
    public function verifyUserViaEmail($token)
    {
        $user = User::where('token', $token)->first();
        if (!$user) {
            //invalid token
            $this->setErrorMessage('Invalid Token');
            return redirect('/');

        }
        //update
        try {
            $user->token = '';
            $user->is_verified = true;
            $user->email_verified_at = now();
            $user->save();
            auth()->guard('web')->login($user);
            return redirect(RouteServiceProvider::USER_HOME);
        }catch(Exception $e){
            dd($e);
        }
    }
}
