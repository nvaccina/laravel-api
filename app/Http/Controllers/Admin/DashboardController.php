<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $n_works = Work::where('user_id', Auth::id())->count();


        return view('admin.home', compact('n_works'));
    }

    public function settings(){
        return view('admin.settings');
    }

    public function stats(){
        return view('admin.stats');
    }
}
