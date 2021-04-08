<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MoneyRequestController extends Controller
{
    public function index(){
        return view()->exists('backend.user.money-request.index') ? view('backend.user.money-request.index') : abort(404);
    }
    public function checkValidEmail($email){
        $user = User::select('id')->whereEmail($email)->where('email' , '!=' ,auth()->user()->email)->first();
        if($user){
            return response()->json([
                'user_id' => $user->id
            ]);
        }else{
            return response()->json([
                'flag' => 'not_available'
            ]);
        }
    }
}
