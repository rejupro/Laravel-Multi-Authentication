<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function adminlogin(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('adminhome');
        }else{
            return view('/admin/login');
        }
        
    }
    public function loggedout(){
        Auth::guard('admin')->logout();
        return redirect()->route('adminlogin')->with('info', 'Logged out Succesfully');
    }
    public function adminhome(){
        return view('admin/adminhome');
    }
    public function logged(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/admin/dashboard')->with('success', 'Logged in Succesfully');
        }else{
            return redirect()->back()->with('info', 'Username Password doesnot matched');
        }
        
    }
}
