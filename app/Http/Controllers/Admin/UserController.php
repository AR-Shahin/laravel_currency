<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       // return $users = User::latest()->get();
        return view()->exists('backend.admin.user.index') ? view('backend.admin.user.index')->with(['users' =>User::latest()->get()]) : abort(404);
    }
}
