<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function add(Request $request)
    {
        $name = $request->name;
        $level = $request->level;
        $username = $request->username;
        $password = $request->password;

        $adduser = User::create([
            'name' => $name,
            'username' => $username,
            'password' => bcrypt($password),
            'no_encrypt' => $password,
            'level' => $level
        ]);

        if ($adduser)
        {
            return redirect('user')->with('success', 'Data Berhasil di Tambahkan');
        }
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->first();
        return view('user.edit', compact('users'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $username = $request->username;
        $password = bcrypt($request->password);
        $no_encrypt = $request->password;
        $level = $request->level;

        $users = User::find($id);
        $users->name = $name;
        $users->username = $username;
        $users->password = $password;
        $users->no_encrypt = $no_encrypt;
        $users->level = $level;

        $update = $users->update();

        if($update)
        {
            return redirect('user')->with('success', 'Data Berhasil Update');
        }
    }

    public function delete($id)
    {
        $delete = User::where('id', $id)->delete();

        if($delete)
        {
            return redirect('user')->with('success', 'Data Berhasil di Hapus');
        }
    }
}
