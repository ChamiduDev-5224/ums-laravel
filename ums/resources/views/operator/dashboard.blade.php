@extends('users.layout')
@section('content')

<div>
        <div class="bg-primary d-flex flex-row align-items-baseline">
               <h2 class="text-center text-light mr-auto p-2">User Management System</h2>
               <span class="text-light p-2 font-bold">
                @php
                    $data=session('email');
                    echo $data
                @endphp
              </span>
               <button class="btn btn-dark m-2"><a class="text-light" href="{{ url('logout') }}">Log out</a></button>
        </div>
        <div>
            @include('layouts.panel')
        </div>
        <div>
            <button class="btn btn-primary mx-5 mt-3"><a href="" class="text-light">Add New Person</a></button>
        </div>
        <div class="mt-4 mx-5">
          <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIC</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Age</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
           </div>
        </div>
</div>
