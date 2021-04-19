<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cashout;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    public function indexCashOut(){
        return view()->exists('backend.admin.cashout.index') ? view('backend.admin.cashout.index',[
            'cashouts' => Cashout::with('user','currency','merchant')->latest()->get()
        ]) : abort(404);
    }
}
