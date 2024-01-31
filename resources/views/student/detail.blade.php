@dd($student)
@section('container')

{{$student -> nis}}
{{$student -> nama}}
{{$student -> tanggal_lahir}}
{{$student -> kelas}}
{{$student -> alamat}}

<a href="student/all">back</a>

@endsection