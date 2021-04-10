<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMoneyRequest;
use App\Models\MoneyRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function storeMoneyRequest(AddMoneyRequest $request){
        if(!Hash::check($request->input('password'), auth()->user()->password)){
            return response()->json(['flag' => 'INCORRECT_PASSWORD']);
        }else{
            try{
                $money = new MoneyRequest();
                $money->user_id = $request->input('user_id');
                $money->auth_id = auth()->id();
                $money->amount = $request->input('amount');
                $money->save();
                return response()->json(['flag' => 'INSERTED']);
            }catch(Exception $e){

            }
        }
    }
    public function getAllMoneyRequestViaUserId(){
        return MoneyRequest::with('user')->where('auth_id',auth()->id())->latest()->get();
    }
}
