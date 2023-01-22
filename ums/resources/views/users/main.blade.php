@extends('users.layout')
@section('content')
<div class="vh-100">
 <div class="bg-primary">
        <h2 class="text-center text-light p-2">User Management System</h2>
 </div>
 <div class="border w-50 mt-10 mx-auto mt-5">

   <form class="my-5">
      <h2 class="text-center font-weight-bold">Login</h2>
      <div class="form-group px-4">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group px-4">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-check mx-1">
        <span>Are you new User? <a href="/register">Register</a></span>
      </div>
      <button type="submit" class="btn btn-primary mx-4 mt-1">Submit</button>
    </form>
 </div>
</div>
@endsection
