<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Files;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $files = Files::all();

        $file_user = Files::all();
        $file_count = Files::count();
        $user_count = User::count();

        return view('dashboard.index', compact('files', 'file_user', 'file_count', 'user_count'));
    }

    public function add(Request $request)
    {
        $file      = $request->file('file');
        $file_name = auth()->user()->id . '_' . $file->getClientOriginalName();

        if ($file->move('./file/', $file_name)) {
            Files::create([
                'file'        => $file_name,
                'user_id'     => auth()->user()->id,
                'judul' => $request->judul
            ]);

            return redirect('/')->with('success', 'File berhasil diupload.');
        }
    }

    public function delete($id)
    {

        $file = Files::where('id', $id)->first();
        $name = $file->file;

        $files = File::delete('./file/' . $name);
        $files = Files::where('id', $id)->delete();

        if ($files) {
            return redirect('/')->with('success', 'File berhasil dihapus.');
        }
    }
}
