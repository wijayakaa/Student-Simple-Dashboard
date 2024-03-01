@extends('layout.partial.dashboard')

@section('container')
    <h1>Edit Student</h1>
    <form action="dashboard/kelas/update/{{ $kelas->id }}" method="post">
        @csrf
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old( 'kelas', $kelas->kelas)}}" required>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 20px"
            onclick="return confirm('Are you sure you want to edit this student?')">Edit</button>
        <a class="btn btn-warning" href="dashboard/kelas/all" style="margin-top: 20px; color:white">Back</a>

    </form>
@endsection