<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        // dd(User::find($user));
        // $user = User::findOrFail($user);
        // return view('profiles.index', [
        //     'user' => $user,
        // ]);
        // return view('index');

        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
           
            'description' => 'required',
            
            'image' => '',
        ]);

        // dd($data);
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}")->with('toast_success','Profile image uploaded successfully');
    }

    public function pic(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.photo', compact('user'));
    }
    
}