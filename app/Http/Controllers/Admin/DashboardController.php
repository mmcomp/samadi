<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        if($admin==null) {
            return redirect('/admin/login');
        }
        return view('admin.dashboard', ["abbas"=>$admin]);
    }
}
