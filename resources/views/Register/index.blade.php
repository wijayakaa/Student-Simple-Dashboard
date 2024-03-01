@extends('layout.main')
@section('container')
<form action="/Register/add" method="post" class="form-signin m-auto text-center" style="width: 30%">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

    <div class="form-floating">
      <input type="name" name="name" class="form-control" id="floatingInput" placeholder="Name">
      <label for="floatingInput">Name</label>
    </div>
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
    <button class="btn btn-primary w-100 py-2" type="submit">Sign Up</button>
    <p class="mt-2">Sudah Punya Akun?<span class="text-primary"> <a class="text-decoration-none" href="/Login/index">Login Disini</a></span></p>
</form>
@endsection