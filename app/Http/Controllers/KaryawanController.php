<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $karyawan = Karyawan::where('nama', 'LIKE', '%' . $search . '%')
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

        Karyawan::create($request->all());

        Session::flash('message', 'Data Karyawan Berhasil Ditambahkan!');
        return redirect()->route('karyawan');
    }

    public function show($id)
    {
        $krw = Karyawan::findOrFail($id);
        return view('karyawan-detail', ['krw' => $krw]);
    }

    public function edit($id)
    {
        $krw = Karyawan::findOrFail($id);
        return view('karyawan-edit', ['krw' => $krw]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|unique:karyawans,nik,' . $id . '|max:255',
            'nama' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        Session::flash('message', 'Data Karyawan Successfully Updated!');
        return redirect()->route('karyawan');
    }

    public function delete($id)
    {
        $krw = Karyawan::findOrFail($id);
        $krw->delete();


        Session::flash('message', 'Karyawan ' . $krw->nama . ' Succesfully DELETED!');
        return redirect()->route('karyawan');
    }
}