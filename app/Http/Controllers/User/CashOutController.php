<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\User;
use App\Models\Cashout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CashOutRequest;
use App\Models\Balance;

class CashOutController extends Controller
{
    public function index()
    {
        if (!Gate::allows('isUser')) abort(404);
        return view()->exists('backend.user.dashboard.index') ? view('backend.user.cashout.index') : abort(404);
    }
    public function checkValidEmail($email)
    {
        $user = User::select('id', 'name')->whereEmail($email)->where('email', '!=', auth()->user()->email)->IsMerchant()->first();
        if ($user) {
            return response()->json([
                'user_id' => $user->id,
                'name' => $user->name
            ]);
        } else {
            return response()->json([
                'flag' => 'not_available'
            ]);
        }
    }
    public function storeCashOutRequest(CashOutRequest $request)
    {
        if (!Hash::check($request->input('password'), auth()->user()->password)) {
            return response()->json(['flag' => 'INCORRECT_PASSWORD']);
        }else if($request->input('amount') > getMyBalance(auth()->id())){
            return response()->json(['flag' => 'INSUFFICIENT_BALANCE']);
        }
         else {
            try {
                $money = new Cashout();
                $money->merchant_id = $request->input('user_id');
                $money->currency_id = $request->input('currency_id');
                $money->auth_id = auth()->id();
                $money->amount = $request->input('amount');
                if($money->save()){
                    $balance = Balance::where('user_id', auth()->id())->decrement('amount', $request->input('amount'));
                    $send = Balance::where('user_id', $request->input('user_id'))->increment('amount', $request->input('amount'));
                }
                return response()->json(['flag' => 'INSERTED']);
            } catch (Exception $e) {
            }
        }
    }
    public function getAllCashOutHistoryViaUserId()
    {
        return Cashout::with('user','merchant', 'currency')->where('auth_id', auth()->id())->latest()->get();
    }
}
