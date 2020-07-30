<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use App\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Auth::user();
        $user_id = $user->id;    

        return view('dashboard', compact('user_id'));
    }

    public function activity_log($id){
        $activities = ActivityLog::select()->where('causer_id', $id)->get();

        return view('user-modules.Activity.activitylog', compact('activities'));
    }
}
