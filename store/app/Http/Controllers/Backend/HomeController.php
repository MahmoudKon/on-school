<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Alert::success('Success Title', 'Success Message');
        
        return view('home');
    }
    
    public function dashboard()
    {        
     
     //   Alert::question('Question Title', ' Message');

        return view('Dashboard.dashboard');
    }



//validate error
/*
             $errors = validator::make($data,[
                'name' => 'required|max:255',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed',
                'role' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,bmp,tiff |max:4096'
                ],$messages = [
                'mimes' => 'Please insert image only',
                'max'   => 'Image should be less than 4 MB',
                'confirmed' => 'Password Must Be Identical'
            ]); */
            
           /*  if ($errors->fails()) {
            return redirect()->route('users/index')
                        ->withErrors($errors)
                        ->withInput();
            }   */
            
        /*    if($validate->fails())
            {
                
                return response()->json(['error', $errors->errors()->all()]);
                
            } 
              */
}
