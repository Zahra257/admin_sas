<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;

class HomeController extends Controller
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
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = Auth::user();

        // Define your logic here based on admin role
        // For example:

        // if ($admin->role === 'super_admin') {
        //     // Logic for super admin
        // } elseif ($admin->role === 'other_role') {
        //     // Logic for other admin roles
        // }

        return view('dashboard');
    }
}
