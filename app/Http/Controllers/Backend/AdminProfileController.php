<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $AdminData = Admin::find(1);
        return view('admin.admin_profile', compact('AdminData'));
    } // end mehtod 

    public function AdminProfileEdit()
    {
        $editAdminData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editAdminData'));
    } // end mehtod 

    public function AdminProfileUpdate(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => ['required'],
                'name' => ['required'],
                // 'profile_photo_path' => 'required|image|mimes:jpeg,png',
            ]
        );

        $model = Admin::find(1);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->created_at = Carbon::now();

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_image/' . $model->profile_photo_path));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'), $fileName);
            $model['profile_photo_path'] = $fileName;
        }

        if ($model->save()) {
            $notification = array(
                'message' => 'Profile updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile')->with($notification);
        }
    } // end mehtod 


    public function AdminChangePassword()
    {   
        return view('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request)
    {
        $validatedData = $request->validate(
            [
                'current_password' => 'required|min:8',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required|min:8',
            ],
        );
        $hasedPassword = Admin::find(1)->password;
        // dd($hasedPassword);
        if (Hash::check($request->current_password, $hasedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            // Auth::logout();
            $notification = array(
                'message' => 'Password is changed successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Old password is invalid',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }
    
}