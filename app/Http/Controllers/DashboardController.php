<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use DB;
use Illuminate\Http\Request;
// use App\User;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // return view('dashboard.index');
       
                $usercount = User::all()->count();
                $postcount = Post::all()->count();
                return view('dashboard.index', compact('usercount','postcount'));
  
    }

    public function show()
    {
        $posts= Post::all();
        return view('dashboard.show',compact('posts'));
  
    }

   
    public function approveShow()
        {
            
            $users = User::all();
            return view('dashboard.approveShow', compact('users'));
        }

        // public function approve()
        // {
        //     $users = User::all();
        //     return view('dashboard.approveShow', compact('users'));
        // }


 
public function status(Request $request, $id){
   
    $data = User::find($id);
 
    if ($data->status == 0) {
        # code...
        $data->status=1;
    }else{
        $data->status=0;
    }
    $data->save();
 
    return Redirect::to('dashboard/approve')->with('message', $data->name.' Status has been changed sucessfully.');
}

public function destroy($id)
    {
        
        $deletee = Post::findOrFail($id);
        $deletee->delete();
        // return view('posts.edit1', compact('post'));
        return Redirect::to('dashboard/posts/show')->with('success','Post deleted successfully');

    }

}
