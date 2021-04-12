<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MoneyRequest;
use Illuminate\Http\Request;


class MoneyRequestController extends Controller
{
    public function index()
    {
        return view()->exists('backend.admin.money-request.index') ? view('backend.admin.money-request.index')->with(['money_requests' => MoneyRequest::with(['user', 'authUser'])->latest()->get()]) : abort(404);
    }
}
