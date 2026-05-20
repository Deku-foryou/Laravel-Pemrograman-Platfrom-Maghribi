<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->title;

       
        $mahasiswas = Mahasiswa::with('dosen_pembimbing')
            ->where('nama', 'LIKE', '%' . $title . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

    
        return view('mahasiswa', ['mahasiswas' => $mahasiswas, 'title' => $title]);
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

        Mahasiswa::create($request->all());

        Session::flash('message', 'Data Mahasiswa Berhasil Ditambahkan!');
        return redirect()->route('mahasiswa');
    }

    public function show($id)
    {
        
        $mhs = Mahasiswa::with(['dosen_pembimbing', 'mata_kuliahs'])->findOrFail($id);
        return view('mahasiswa-detail', ['mhs' => $mhs]);
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa-edit', ['mhs' => $mhs]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id . '|max:255',
            'nama' => 'required',
            'email' => 'required|email',
            'jurusan' => 'required',
            'angkatan' => 'required',
        ]);
        
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($request->all());
        
        Session::flash('message', 'Data Mahasiswa Successfully Updated!');
        return redirect()->route('mahasiswa');
    }

   public function delete($id)
   {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->delete();

        Session::flash('message', 'Mahasiswa ' . $mhs->nama . ' Succesfully DELETED!');
        return redirect()->route('mahasiswa');
   }
}