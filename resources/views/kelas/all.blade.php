@extends('layout.main')

<style>
    table {
        border-collapse: separate;
        border-spacing: 0 2px;
    }

    th,
    td {
        padding: 5px 10px;
    }
</style>

@section('container')
    {{-- tempat content --}}
    <h1>Tabel Data Kelas</h1>
    <a type="button" class="btn btn-primary" href="/kelas/create/" style="margin-bottom: 15px">Add Data</a>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($kelas as $Kelas)
                <tr>

                    <td>{{$no++}}</td>
                    <td>{{ $Kelas->kelas }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="/kelas/detail/{{ $Kelas->id }}">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection