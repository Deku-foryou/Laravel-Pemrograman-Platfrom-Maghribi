<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search; // Menggunakan name="search" dari form 
        
        $karyawan = DB::table('karyawans')
            ->where('nama', 'LIKE', '%' . $search . '%')
            ->orWhere('nik', 'LIKE', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('karyawan', ['karyawan' => $karyawan, 'search' => $search]);
    }

    public function add()
    {
        return view('karyawan-add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:karyawans',
            'nama' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
        ]);

        DB::table('karyawans')->insert([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Session::flash('message', 'Data Karyawan Berhasil Ditambahkan!');

        return redirect()->route('karyawan');
    }

    public function show($id)
    {
        $krw = DB::table('karyawans')->where('id', '=', $id)->first();
        return view('karyawan-detail', ['krw' => $krw]);
    }
    function edit($id) {
        $krw = DB::table('karyawans')->where('id', $id)->first();
        if (!$krw) abort(404);
        return view('karyawan-edit', ['krw' => $krw]);
    }

   function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|unique:karyawans,nik,' . $id . '|max:255',
            'nama' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
        ]);
        
        DB::table('karyawans')->where('id', $id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'updated_at' => now()
        ]);
        
        Session::flash('message', 'Data Karyawan Succesfully Updated!');
        return redirect()->route('karyawan');
    }

    function delete($id) {
        DB::table('karyawans')->where('id', $id)->delete();
        Session::flash('message', 'Data Karyawan Berhasil Dihapus!');
        return redirect()->route('karyawan');
    }
}