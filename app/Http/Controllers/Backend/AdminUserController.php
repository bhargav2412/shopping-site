<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function AllAdminRole()
    {

        $adminuser = Admin::where('type', 2)->latest()->get();
        return view('backend.role.admin_all_role', compact('adminuser'));
    } // end method 
}
