<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMoneyRequest;
use App\Http\Requests\CustomMoneyAddRequest;
use App\Models\Balance;
use App\Models\MoneyRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       // return $users = User::latest()->get();
        return view()->exists('backend.admin.user.index') ? view('backend.admin.user.index')->with(['users' =>User::latest()->get()]) : abort(404);
    }
    public function addMoney(User $email)
    {
        return view()->exists('backend.admin.user.add-money') ? view('backend.admin.user.add-money')->with(['user' => $email]) : abort(404);
    }
    public function addMoneyInUser(CustomMoneyAddRequest $request)
    {
        $data = $request->validated();
        $user =  Balance::select('id','amount')->where('user_id',$request->input('user_id'))->first();
        try {
            if($user){
                $user->amount += $request->input('amount');
                $user->save();
            }else{
                Balance::create($data);
            }
            $this->setSuccessMessageForDashboard('Money Save Successfully!');
            return back();
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function userAllTransactionHistory($id)
    {
        if(!$user = User::where('id',$id)->first()){
            abort(404);
        }
        $data['user'] = $user;
        $data['send_requests'] = MoneyRequest::with(['user'])->where('auth_id',$id)->latest()->get();
        $data['receive_requests'] = MoneyRequest::with(['authUser'])->where('user_id', $id)->latest()->get();
        return view()->exists('backend.admin.user.history') ? view('backend.admin.user.history',$data) : abort(404);
    }

}
