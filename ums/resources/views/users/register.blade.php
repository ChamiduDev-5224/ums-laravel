@extends('users.layout')
@section('content')
<div class="vh-100">
 <div class="bg-primary">
     <h2 class="text-light text-center py-2">User Management System</h2>
 </div>
{{-- register form --}}
 <div class="border w-50 mt-10 mx-auto mt-5">
   <form class="my-5" method="POST" action="{{ route('register.user') }}">
    @csrf
      <h2 class="text-center font-weight-bold">Register</h2>

      <div class="form-group px-4">
        <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">

          @if ($errors->has('email'))
            <span class="text-danger px-4">{{ $errors->first('email') }}</span>
          @endif

      </div>

      <div class="form-group px-4">
        <label for="exampleInputRole">Select Role</label>
      <select class="custom-select" id="role" name="role">
        <option selected>Open this select menu</option>
        <option value="data_entry">Data Entry</option>
        <option value="data_viewer">Data Viewer</option>
      </select>

        @if ($errors->has('role'))
        <span class="text-danger px-4">{{ $errors->first('role') }}</span>
        @endif

       </div>

      <div class="form-group px-4">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">

        @if ($errors->has('password'))
        <span class="text-danger px-4">{{ $errors->first('password') }}</span>
        @endif

      </div>

      <div class="form-check mx-1">
        <span>Are you existing User? <a href="/">Login</a></span>
      </div>

      <button type="submit" class="btn btn-primary mx-4 mt-1">Submit</button>
    </form>
 </div>
</div>
@endsection
