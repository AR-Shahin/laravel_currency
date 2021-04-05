<?php

namespace App\Http\Controllers\User\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\Notifications\UserEmailVerificationNotification;

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
            $user->token = $request->input('email');
            $user->role = $request->input('role');
            if($user->save()){
                $user->notify(new UserEmailVerificationNotification($user));
                return 222;
            }
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
    public function verifyUserViaEmail($token)
    {
       return $token;
    }
}
