<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSuccessMessage($message)
    {
        session()->flash('message', $message);
        session()->flash('type', 'success');
    }
    public function setErrorMessage($message)
    {
        session()->flash('message', $message);
        session()->flash('type', 'danger');
    }
    public function setSuccessMessageFront($message)
    {
        session()->flash('front_message', $message);
        session()->flash('type', 'success');
    }
    public function setErrorMessageFront($message)
    {
        session()->flash('front_message', $message);
        session()->flash('type', 'danger');
    }
    public function setSuccessMessageForDashboard($message)
    {
        session()->flash('dash_message', $message);
        session()->flash('type', 'success');
    }
}
