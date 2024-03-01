@extends('layout.partial.dashboard')

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
    <a type="button" class="btn btn-primary" href="dashboard/kelas/create/" style="margin-bottom: 15px">Add Data</a>
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
                        <a type="button" class="btn btn-primary" href="dashboard/kelas/detail/{{ $Kelas->id }}">Detail</a>
                        <a type="button" class="btn btn-warning" href="dashboard/kelas/edit/{{ $Kelas->id }}"
                            style="color: white"">Edit</a>
                        <form action="dashboard/kelas/delete/{{ $Kelas->id }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection