<?php

namespace App\Http\Controllers;

use App\models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
{
    return view('student.all', [
        "title" => "Students",
        "students" => Student::all(),
    ]);
}
    public function show($student){
        return view('student.detail',[
            "title" => "Student-detail",
            "students" => Student::find($student)
        ]
        );
    }
    public function create (){
        return view('student.create',[
            "title" => "Student-create",
            "kelass" => Kelas::all()
        ]
        );
    }
    public function store (Request $request){

        $validateData = $request->validate([
            'nis' => 'required|max:225',
            'nama' => 'required|max:225',
            'tanggal_lahir' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);        
        
        $result = Student::create($validateData);
        if ($result) {
            return redirect('/student/all')->with('success','data siswa berhasil di tambahkan');
        } 
    }
    public function destroy(Student $student){
       $result = Student::destroy($student->id);
       if ($result) {
        return redirect('/student/all')->with('success', 'Data berhasil di hapus');
       }
    }
    public function edit(Student $student){
        return view('student.edit',[
            "title" => "edit-data",
            "student" => $student
        ]);
     }
     public function update(Request $request, Student $student){
        $validateData = $request->validate([
            'nis' => 'required|max:225',
            'nama' => 'required|max:225',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        // Update the student data
        $result = Student::where('id', $student->id)->update($validateData);

        // Check if the update was successful
        if ($result) {
            return redirect('/student/all')->with('success', 'Data siswa berhasil diupdate');
        } else {
            // If the update fails, you might want to handle it accordingly
            return redirect('/student/all')->with('error', 'Gagal mengupdate data siswa');
        }
    }
}