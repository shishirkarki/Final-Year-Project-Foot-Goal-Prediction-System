<?php

namespace App\Http\Controllers;
use App\Post;
use App\Notification;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $users = auth()->user()->posts;
        //$users = Post::all();
        
        //dd($users);
        $notifications = Notification::all();
        $posts = Post::all();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        
        return view('posts.index', compact('posts','notifications'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        
        $data = request()->validate([
            'caption' => 'required',
            //'status' => 'required',
            'image' => 'required',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath ?? null,
        ]);

        return redirect('/profile/' . auth()->user()->id)->with('toast_success', 'Post was  created sucessfully');
    }
// shows the photo function
    public function show(\App\Post $post)
    {
        // dd($post);
        return view('posts.show', compact('post'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);
        //$users = auth()->user()->posts;
        $query = $request->input('query');
        $posts = DB::table('users')->where('name','like', "%".$query."%")->get();
        //dd($posts);
         return view('posts.search', compact('posts'));
        // return view('profiles.search-results');
    }

    public function status()
    {
        $data = request()->validate([
            
            'status' => 'max:1000',

            
        ]);
         auth()->user()->posts()->create([
          'status' => $data['status'],
            
        ]);
        return redirect('/profile/' . auth()->user()->id)->with('toast_success', 'Post was  created successfully');
        
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        
        $postss = Post::findOrFail($id);
        $data = request()->validate([
            'caption' => '',
            //'status' => 'required',
            'image' => '',
        ]);
        //dd(request()->all());
        $imagePath = request('image')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        
        $postss->update([
        // auth()->user('id',$id)->posts('id',$id)->update([
            'caption' => $data['caption'],
            'image' => $imagePath ?? null,
        ]);

        return redirect('/profile/' . auth()->user()->id)->with('toast_success', 'Edit Successfully');
        // return view('posts.photo');   
    }

// status edit
    public function editStatus(Post $post)
    {
        return view('posts.editStatus', compact('post'));
    }
//update status
    public function updateStatus(Request $request, $id)
    {
        $Statuss = Post::findOrFail($id);
        $data = request()->validate([ 
            'status' => 'max:1000',   
        ]);
        $Statuss->update([
          'status' => $data['status'],  
        ]);
        return redirect('/profile/' . auth()->user()->id)->with('toast_success', 'Edit Successfully');
        
    }


    public function destroy($id)
    {
        
        $deletee = Post::findOrFail($id);
        $deletee->delete();
        // return view('posts.edit1', compact('post'));
        return redirect('/profile/' . auth()->user()->id)->with('success','Post deleted successfully');

    }


    public function destroyStatus($id)
    {
        
        $deletes = Post::findOrFail($id);
        $deletes->delete();
        // return view('posts.edit1', compact('post'));
        return redirect('/profile/' . auth()->user()->id)->with('success','Post deleted successfully');


    }

}
