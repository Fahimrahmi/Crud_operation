<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Services\ImageService;


class UserController extends Controller
{

    public function index()
    {
        $user = Users::all();
        return view('Users.index')->with('user' , $user);
    }


    public function create()
    {
        
        return view('Users.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            // 'image' => 'required|image',
        ]);

        $user = New Users();

        $user->title = $request->title;
        $user->content = $request->content;
        // if($request->hasFile('image')){
        //     $user->image = ImageService::storeImage($request->file('image'),"images",null);

        // }
       
        $user->save();


        // $input = $request->all();
        // Users::create($input);
        return redirect('User')->with('flash_message','Users title Added');
    }


    public function show($id)
    {
        $user = Users::findOrFail($id);
        return view('Users.show')->with('user' , $user);
    }


    // public function edit($id)
    // {
    //     // dd($id);
    //      $user = Users::find($id);
    //       return view('Users.edit')->with('user', $user);
    // }
    public function edit($id)
{
    $user = Users::find($id);
    if (!$user) {
        // Handle the case where the user is not found
        return redirect()->back()->with('error', 'User not found');
    }
    return view('Users.edit')->with('user', $user);
}



   // Update method
   public function update(Request $request, $id) {

    $user = Users::find($id);


    $user->title = $request->title;
    $user->content = $request->content;
    if($request->hasFile('image')){
        $user->image = ImageService::storeImage($request->file('image'), "images",$user->image);
    }

    $user->save();
  
    return redirect('User')->with('success', 'User updated!');
  
  }


    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect('/User')->with('success', 'User deleted!');

    }
}
