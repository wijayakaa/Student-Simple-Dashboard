@extends("layout.main")
@section("container")
<form method="post" action="dashboard/student/update/{{$student->id}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan NIS</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nis" value="{{ old('nis',$student->nis)}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama"value="{{ old('nama',$student->nama)}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Kelas</label>
    <select class="form-select" name="kelas_id">
                @foreach ($kelas as $Kelas)
                @if($Kelas->id == $student->kelas_id)
                <option name="kelas_id" value="{{ $Kelas->id }}" selected>{{ $Kelas->kelas }}</option>
                @else
                    <option name="kelas_id" value="{{ $Kelas->id }}">{{ $Kelas->kelas }}</option>
                @endif
                @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Kota</label>
    <input type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat"value="{{ old('alamat',$student->alamat)}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal lahir</label>
    <input type="date" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal_lahir" value="{{ old('tanggal_lahir',$student->tanggal_lahir)}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection