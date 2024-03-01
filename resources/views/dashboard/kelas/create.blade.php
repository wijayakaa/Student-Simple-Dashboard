@extends('layout.partial.dashboard')

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
    <h1>Add Class</h1>
    <form action="/dashboard/kelas/add" method="post">
        @csrf
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas') }}">
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 20px; color: white">Add Kelas</button>
        <a class="btn btn-danger" href="dashboard/kelas/all" style="margin-top: 20px; color:white">Back</a>
    </form>
@endsection