<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller{
    public function index()
{

    return view('kelas.all', [
        "title" => "Kelas",
        "kelas" => Kelas::all(),
    ]);
}
    public function show($kelas){
        return view('kelas.detail',[
            "title" => "Kelas-detail",
            "kelas" => Kelas::find($kelas)
        ]
        );
    }
    public function create (){
        return view('kelas.create',[
            "title" => "Kelas-create",
            "kelas" => Kelas::all()
        ]
        );
    }
    public function store (Request $request){

        $validateData = $request->validate([
            'nis' => 'required|max:225',
            'nama' => 'required|max:225',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);        
        
        $result = Kelas::create($validateData);
        if ($result) {
            return redirect('/kelas/all')->with('success','data siswa berhasil di tambahkan');
        } 
    }
    public function destroy(Kelas $kelas){
       $result = Kelas::destroy($kelas->id);
       if ($result) {
        return redirect('/kelas/all')->with('success', 'Data berhasil di hapus');
       }
    }
    public function edit(Kelas $kelas){
        return view('kelas.edit',[
            "title" => "edit-data",
            "kelas" => $kelas
        ]);
     }
     public function update(Request $request, Kelas $kelas){
        $validateData = $request->validate([
            'nis' => 'required|max:225',
            'nama' => 'required|max:225',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        // Update the kelas data
        $result = Kelas::where('id', $kelas->id)->update($validateData);

        // Check if the update was successful
        if ($result) {
            return redirect('/kelas/all')->with('success', 'Data siswa berhasil diupdate');
        } else {
            // If the update fails, you might want to handle it accordingly
            return redirect('/kelas/all')->with('error', 'Gagal mengupdate data siswa');
        }
    }
}