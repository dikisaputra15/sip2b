<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    use RegistersUsers;
    
    public function index()
    {
        $users = User::all();
        return view('admin.manageuser', compact('users'));
    }

    public function adduser()
    {
        return view('auth.register');
    }

    public function storeregister(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->role
        ]);

        return redirect('admin/user')->with('alert-primary','user created successfully');
       
    }

    public function edituser($id)
    {
        $user = User::find($id);
        return view('admin.edituser', compact(['user']));
    }

    public function changeuserpass($id)
    {
        $user = User::find($id);
        return view('admin.changeuserpass', compact(['user']));
    }
}
