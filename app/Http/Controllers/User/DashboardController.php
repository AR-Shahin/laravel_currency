<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view()->exists('backend.user.dashboard.index') ? view('backend.user.dashboard.index') : abort(404);
    }
}
