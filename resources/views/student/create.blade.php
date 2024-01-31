@extends("layout.main")
@section("container")
<form method="post" action="/student/add">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan NIS</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nis" value="{{ old('nis')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama"value="{{ old('nama')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Kelas</label>
    <select class="form-select" name="kelas_id" id="">
      @foreach ($kelass as kelas)
      <option name="kelas_id" value="{{ $kelas_id }}">{{$kelas->nama}}</option>
      @endforeach
    <select>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kelas"value="{{ old('kelas')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Kota</label>
    <input type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat"value="{{ old('alamat')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal lahir</label>
    <input type="date" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal_lahir" value="{{ old('tanggal_lahir')}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection