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
    <h2>Detail Students {{ $kelas->nama }}</h2>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>
                <th scope="col">Kelas</th>
                </th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $kelas->kelas }}</td>

        </tr>
    </table>
    <a class="btn btn-danger" href="dashboard/kelas/all" style="margin-top: 20px; color:white">Back</a>
@endsection