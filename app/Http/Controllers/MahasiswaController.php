<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        // Menggunakan 'title' sesuai dengan name="title" di form search
        $title = $request->title;

        $mahasiswa = DB::table('mahasiswas')
            ->where('nama', 'LIKE', '%' . $title . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('mahasiswa', ['mahasiswa' => $mahasiswa, 'title' => $title]);
    }

    public function add()
    {
        return view('mahasiswa-add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'email' => 'required|email',
            'jurusan' => 'required',
            'angkatan' => 'required',
        ]);

        DB::table('mahasiswas')->insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Session::flash('message', 'Data Mahasiswa Berhasil Ditambahkan!');

        return redirect()->route('mahasiswa');
    }

    public function show($id)
    {
        $mhs = DB::table('mahasiswas')->where('id', '=', $id)->first();

        return view('mahasiswa-detail', ['mhs' => $mhs]);
    }
    function edit($id) {
        $mhs = DB::table('mahasiswas')->where('id', $id)->first();
        if (!$mhs) abort(404);
        return view('mahasiswa-edit', ['mhs' => $mhs]);
    }
function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id . '|max:255',
            'nama' => 'required',
            'email' => 'required|email',
            'jurusan' => 'required',
            'angkatan' => 'required',
        ]);
        
        DB::table('mahasiswas')->where('id', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'updated_at' => now()
        ]);
        
        Session::flash('message', 'Data Mahasiswa Succesfully Updated!');
        return redirect()->route('mahasiswa');
    }

    function delete($id) {
        DB::table('mahasiswas')->where('id', $id)->delete();
        Session::flash('message', 'Data Mahasiswa Berhasil Dihapus!');
        return redirect()->route('mahasiswa');
    }
}