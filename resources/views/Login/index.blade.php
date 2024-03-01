@extends('layout.main')
@section('container')
<form action="/Login/add" method="post" class="form-signin m-auto text-center" style="width: 30%">
    @csrf
    @if(session('success'))
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" width="20" height="20"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{ session('success') }}
        </div>
    </div>
    @elseif(session('failed'))
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:" width="20" height="20"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>
        {{ session('failed') }}
      </div>
    </div>
    @endif
    <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign In</button>
    <p class="mt-2">Belum Punya Akun?<span class="text-primary"> <a class="text-decoration-none" href="/Register/index">Daftar Sekarang</a></span></p>
</form>
@endsection