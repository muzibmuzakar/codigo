<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }

    public function register(){
        return view('user.register');
    }

    function save(Request $request){
        // validate request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // insert data
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 2;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            return back()->with('success', 'New user has been succesfuly added to database !');
        }else{
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}
