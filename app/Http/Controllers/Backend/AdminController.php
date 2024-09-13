<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashbaord(): View
    {
        return view('admin.dashboard');
    }//End Method

    public function login(): View
    {
        return view('admin.auth.login');
    }//End Method
}
