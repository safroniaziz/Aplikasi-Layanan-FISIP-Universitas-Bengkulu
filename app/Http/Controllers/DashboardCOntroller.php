<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){
        if (!Gate::allows('dashboard')) {
            abort(403);
        }
        return view('backend.dashboard.index');
    }
}
