@extends('layout.main')

<style>
    .button {
        background-color: red;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 15px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>

@section('container')
    <h1>Add Student</h1>
    <form action="dashboard/student/add " method="post">
        @csrf
        
        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="number" name="nis" id="nis" class="form-control" required value="{{ old('nis') }}">
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                value="{{ old('tanggal_lahir') }}">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select class="form-select" name="kelas_id">
                @foreach ($kelas as $Kelas)
                    <option name="kelas_id" value="{{ $Kelas->id }}">{{ $Kelas->kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required value="{{ old('alamat') }}">
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 20px; color: white">Add Student</button>
        <a class="btn btn-danger" href="dashboard/student/all" style="margin-top: 20px; color:white">Back</a>
    </form>
@endsection