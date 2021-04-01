<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view()->exists('backend.admin.dashboard.index') ? view('backend.admin.dashboard.index') : abort(404);
    }
}
