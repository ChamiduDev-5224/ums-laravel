@extends('users.layout')
@section('content')
<div class="vh-100">
 <div class="bg-primary">
        <h2 class="text-center text-light p-2">User Management System</h2>
 </div>
 @if ($errors->any())
    <div class="alert alert-danger w-25 mx-3">
            @foreach ($errors->all() as $error)
             <strong>Whoop!!</strong> <span>{{ $error }}</span>
            @endforeach
    </div>
@endif
 <div class="border w-50 mt-10 mx-auto mt-5">

   <form class="my-5" method="POST" action="{{route('login.user')}}">
    @csrf
      <h2 class="text-center font-weight-bold">Login</h2>
      <div class="form-group px-4">
        <label>Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group px-4">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <div class="form-check mx-1">
        <span>Are you new User? <a href="/register">Register</a></span>
      </div>
      <button type="submit" class="btn btn-primary mx-4 mt-1">Submit</button>
    </form>
 </div>
</div>
@endsection
