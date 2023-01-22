@extends('users.layout')
@section('content')
<div class="vh-100">
 <div class="bg-primary">
    <div class="d-flex flex-row">
        <h2 class="text-center text-light mr-auto p-2">User Management System</h2>
        <button class="btn btn-danger m-3" > <a href="/" class="text-light">Data Entry</a></button>
    </div>

 </div>
 <div class="border w-50 mt-10 mx-auto my-5">
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
      <button type="submit" class="btn btn-primary mx-4 mt-1">Submit</button>
    </form>
 </div>
</div>
@endsection
