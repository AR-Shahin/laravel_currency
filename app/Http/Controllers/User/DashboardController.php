<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view()->exists('backend.user.dashboard.index') ? view('backend.user.dashboard.index',[
            'currencies' => Currency::latest()->get()
        ]) : abort(404);
    }
}
