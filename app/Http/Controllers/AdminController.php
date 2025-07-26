<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admin_dashboard_view() {
        return view('pages.admin.dashboard');
    }

    
}
