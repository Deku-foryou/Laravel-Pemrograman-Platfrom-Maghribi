<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search; 
        
        $dosen = DB::table('dosens')
            ->where('nama', 'LIKE', '%' . $search . '%')
            ->orWhere('nidn', 'LIKE', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10); 

        return view('dosen', ['dosen' => $dosen, 'search' => $search]);
    }

    public function add()
    {
        return view('dosen-add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens',
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        DB::table('dosens')->insert([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Session::flash('message', 'Data Dosen Berhasil Ditambahkan!');

        return redirect()->route('dosen');
    }

    public function show($id)
    {
        $dsn = DB::table('dosens')->where('id', '=', $id)->first();
        return view('dosen-detail', ['dsn' => $dsn]);
    }
    function edit($id) {
        $dsn = DB::table('dosens')->where('id', $id)->first();
        if (!$dsn) abort(404);
        return view('dosen-edit', ['dsn' => $dsn]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $id . '|max:255',
            'nama' => 'required',
            'email' => 'required|email',
        ]);
        
        DB::table('dosens')->where('id', $id)->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'updated_at' => now()
        ]);
        
        Session::flash('message', 'Data Dosen Succesfully Updated!');
        return redirect()->route('dosen');
    }

    function delete($id) {
        DB::table('dosens')->where('id', $id)->delete();
        Session::flash('message', 'Data Dosen Berhasil Dihapus!');
        return redirect()->route('dosen');
    }
}