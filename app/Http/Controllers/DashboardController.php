<?php

namespace App\Http\Controllers;
    
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;


class DashboardController extends Controller
{
    public function all() 
    {
        if(!Auth::check()) return redirect()->route('student.all');

        return view ('dashboard.all.all', [
            "title" => "Dashboard",
        ]);
    }

    public function student(Request $request) 
    {

        if(!Auth::check()) return redirect()->route('student.all');

        $selectedClass = $request->input('kelas_id');
        $searchName = $request->input('search');
        
        $students = Student::when($selectedClass, function ($query) use ($selectedClass) {
            return $query->where('kelas_id', $selectedClass);
        })->when($searchName, function ($query) use ($searchName) {
            $query->where(function ($query) use ($searchName) {
                $query->where('nama', 'like', '%' . $searchName . '%');
            })->get();
        })->latest()
        ->paginate(5);

        return view ('dashboard.student.all', [
            "title" => "Dashboard",
            "students" => $students,
            "kelass" => Kelas::all()
        ]);
    }

    public function studentShow($student)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        return view ('.dashboard.student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student),
        ]);
    }

    public function studentCreate() 
{
    if(!Auth::check()) return redirect()->route('student.all');

    return view ('dashboard.student.create', [
        "title" => "Students",
        "kelas" => Kelas::all() 
    ]);
}


    public function studentStore(Request $request)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        $validateData = $request->validate([
            'nis'           => 'required|max:255',
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);

        $result = Student::create($validateData);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil ditambahkan !');
        }
    }

    public function studentDestory(Student $student) 
    {
        if(!Auth::check()) return redirect()->route('student.all');

        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function studentEdit(Student $student)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        return view ('dashboard.student.edit', [
            "title" => "edit-data",
            "student" => $student,
            "kelass" => kelas::all()
        ]);
    }

    public function studentUpdate(Request $request, Student $student)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        $validateData = $request->validate([
            'nis'           => 'required|max:255',
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id'      => 'required',
            'alamat'        => 'required',
        ]);

        $result = Student::where('id', $student->id)->update($validateData);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data berhasil diubah !');
        }
    }

    public function kelas() 
    {
        if(!Auth::check()) return redirect()->route('student.all');

        return view ('dashboard.kelas.all', [
            "title" => "Dashboard",
            "kelas" => kelas::all(),
        ]);
    }

    public function kelasShow($kelas)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        return view ('dashboard.kelas.detail', [
            "title" => "detail-kelas",
            "kelas" => kelas::find($kelas),
        ]);
    }

    public function kelasCreate() 
    {
        if(!Auth::check()) return redirect()->route('student.all');
        $kelas = Kelas::all();
    
        return view ('dashboard.student.create', [
            "title" => "Students",
            "kelas" => $kelas
        ]);
    }

    public function kelasStore(Request $request)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        $validateData = $request->validate([
            'kelas' => 'required|max:255',
        ]);

        $result = kelas::create($validateData);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil ditambahkan !');
        }
    }

    public function kelasDestory(kelas $kelas) 
    {
        if(!Auth::check()) return redirect()->route('student.all');

        $result = kelas::destroy($kelas->id);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function kelasEdit(kelas $kelas)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        return view ('dashboard.kelas.edit', [
            "title" => "edit-data",
            "kelas" => $kelas,
        ]);
    }

    public function kelasUpdate(Request $request, kelas $kelas)
    {
        if(!Auth::check()) return redirect()->route('student.all');

        $validateData = $request->validate([
            'kelas' => 'required|max:255',
        ]);

        $result = kelas::where('id', $kelas->id)->update($validateData);
        if ($result) {
            return redirect('/dashboard/kelas/all')->with('success', 'Data berhasil diubah !');
        }
    }
}