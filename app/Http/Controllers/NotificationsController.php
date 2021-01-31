<?php

namespace App\Http\Controllers;
use App\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
class NotificationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // $notifications = Notification::all();
        return view('dashboard.message');
       
    }
    // public function index1()
    // {
    //     $notifications = Notification::all();
    //     return view('layouts.app', compact('notifications'));
       
    // }

    public function message()
    {
        $data = request()->validate([
            
            'message' => 'max:1000',

           //dd($notifications);
        ]);
        // dd(request()->all());
         auth()->user()->notifications()->create([
          'message' => $data['message'],
            
        ]);
        // return redirect('/profile/' . auth()->user()->id)->with('success', 'Post was  created successfully');
        return Redirect::to('dashboard/notification')->with('success','Mesage send successfully');
        
    }
}
