<?php

namespace App\Http\Controllers\User;

use App\Models\MoneyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;

class ReceiveRequestController extends Controller
{
    public function index(){
        return view()->exists('backend.user.receive-request.index') ? view('backend.user.receive-request.index') : abort(404);
    }

    public function getAllMoneyReceivedRequestViaUserId()
    {
        return MoneyRequest::with('authUser')->where('user_id', auth()->id())->latest()->get();
    }

    public function approveMoneyRequest(MoneyRequest $money){
        if($money->amount > getMyBalance(auth()->id())){
            $money->status = 2;
            $money->save();
            return response()->json(['flag' => 'INSUFFICIENT_BALANCE']);
        }else{
            $balance = Balance::where('user_id',auth()->id())->decrement('amount',$money->amount);
            if($balance){
                $money->status = 1;
                $money->save();
            }
            return response()->json(['flag' => 'APPROVED_REQUEST']);
        }
    }
}
