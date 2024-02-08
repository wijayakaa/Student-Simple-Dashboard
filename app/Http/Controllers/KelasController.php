<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.all', [
            "title" => "Kelas",
            "kelas" => Kelas::all()
        ]);
    }

    public function show($kelas)
    {
        return view('kelas.detail', [
            "title" => "detail-kelas",
            "kelas" => Kelas::find($kelas)
        ]);
    }

    public function create()
    {
        return view('kelas.create', [
            'title' => 'Add Kelas',
        ]);
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'), [
            'title' => 'Edit Kelas',
        ]);
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->update($request->all());

        if ($request) {
            return redirect('/kelas/all')->with('success', 'Kelas d successfully!');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required',
        ]);

        $result = Kelas::create($validatedData);

        if ($result) {
            return redirect('/kelas/all')->with('success', 'Kelas added successfully!');
        }

    }
    public function destroy(Kelas $kelas)
    {
        $result = Kelas::destroy($kelas->id);
        if ($result) {
            return redirect('/kelas/all')->with('success', 'Kelas deleted successfully!');
        }
    }
}