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
    <h2>Detail Students {{ $student->nama }}</h2>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                </th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->tanggal_lahir }}</td>
            <td>{{ $student->kelas->kelas }}</td>
            <td>{{ $student->alamat }}</td>

        </tr>
    </table>
    <a class="btn btn-danger" href="dashboard/student/all" style="margin-top: 20px; color:white">Back</a>
@endsection