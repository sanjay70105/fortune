<?php

namespace App\Http\Controllers;

use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminPage(){
        return view('admin.admin');
    }
    public function AdminDashboard(){
        $states=state::all();
        return view('admin.dashboard',compact('states'));
    }
    public function AdminLoginProcess(request $request){
        $credentials=$request->validate([
            'email'=>'required|string',
            'password'=>'required|min:6'
        ]);
        if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        else{
            return redirect()->route('admin.login.page')->withErrors('Invalid Credentials');
        }
    }
    public function AdminLogout(request $request){
      Auth::guard('admin')->logout();
      $request->session()->invalidate();
      $request->session()->regenerate();
      return redirect()->route('admin.login.page');
    }
}
