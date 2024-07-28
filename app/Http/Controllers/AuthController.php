<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function index(){
    return view('auth.login');
   }
   public function authenticate(Request $request) {
    if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/');
    } else {
        return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }
}

  public function logout()
    {
     Auth::logout();
     return redirect('/');
  }

    public function show(){
    return view('auth.registration');
   }

    public function store(Request $request) {
      $request->validate([
       'name' => 'required',
       'email' => 'required|email',
       'password' => 'required']);

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();

      return redirect('/')->with('success', 'Your account has been created!');

   }

}