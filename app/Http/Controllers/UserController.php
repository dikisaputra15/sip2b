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

    public function updatepass(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId($request->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('admin/user')->with('alert-primary','password updated');

    }

    public function destroyuser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect("admin/user");
    }
}
