<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Users;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function add(){
        return view('dashboard.users.add');
    }

    public function edit($id){
        $user = Users::find($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'roles' => 'required'
        ]);        

        $users = new Users([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'password' => hash::make($request->get('password')),
            'roles' => $request->get('roles'),
            'registered_at' => Carbon::now()->toDateTimeString()
        ]);
        $users->save();
        return redirect('/dashboard/users')->with('success', 'Data telah ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'roles' => 'required'
        ]);         

        $user = Users::find($id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->password = hash::make($request->get('password'));
        $user->roles = $request->get('roles');
        $user->save();
        return redirect('/dashboard/users')->with('success', 'Data telah diperbarui!');
    }

    public function delete($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect('/dashboard/users')->with('success', 'Data telah dihapus!');
    }
}