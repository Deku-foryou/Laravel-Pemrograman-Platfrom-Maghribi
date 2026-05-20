<?php

namespace App\Http\Controllers;

use App\Models\Dosen; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        
        $dosen = Dosen::where('nama', 'LIKE', '%' . $search . '%')
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
            'matkul' => 'required',
        ]);

        Dosen::create($request->all());

        Session::flash('message', 'Data Dosen Berhasil Ditambahkan!');
        return redirect()->route('dosen');
    }

    public function show($id)
    {
        $dsn = Dosen::findOrFail($id);
        return view('dosen-detail', ['dsn' => $dsn]);
    }

    public function edit($id)
    {
        $dsn = Dosen::findOrFail($id);
        return view('dosen-edit', ['dsn' => $dsn]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $id . '|max:255',
            'nama' => 'required',
            'email' => 'required|email',
            'matkul' => 'required',
        ]);
        
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        
        Session::flash('message', 'Data Dosen Successfully Updated!');
        return redirect()->route('dosen');
    }

    public function delete($id)
{
    $dsn = Dosen::findOrFail($id);
    $dsn->delete();

    Session::flash('message', 'Dosen ' . $dsn->nama . ' Succesfully DELETED!');
    return redirect()->route('dosen');
}
}