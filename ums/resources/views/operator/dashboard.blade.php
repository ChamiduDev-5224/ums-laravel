@extends('users.layout')
@section('content')
@php
$role=session('role');
@endphp
<div>
     <div>
        @include('layouts.header')
     </div>
        <div>
            <div class="main-section mt-4 d-flex bg-info mx-5 rounded justify-content-between px-4 overflow-auto">
                {{-- {{$totalRegister}} --}}
                <h3 class="py-3">Registered count : @if (!empty($personCount))
                    {{$personCount}}
                @else
                   0
                @endif </h3>
                <h3 class="py-3">Data Viewers : @if (!empty($viewersCount))
                    {{$viewersCount}}
                @else
                   0
                @endif </h3>
                <h3 class="py-3">Data Operators : @if (!empty($operatorsCount))
                    {{$operatorsCount}}
                @else
                   0
                @endif </h3>
            </div>
        </div>
        <div class="d-flex flex-row align-items-baseline mx-5">
            {{-- button link --}}
            <button class="btn btn-primary mt-2 py-2"><a href="{{url('operator-dashboard/add-new')}}" class="text-light">Add New Person</a></button>
            <button class="btn btn-primary mx-2 mt-3 py-2"><a href="{{url('show-chart')}}" class="text-light">Chart Analysis</a></button>

            {{-- show toast --}}
            @if ($message = Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Well done!</strong> {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
               @endif

        </div>

        {{-- data table --}}
        <div class="mx-5">
          <div class="table-responsive">
            <table class="table table-hover" id="myTable">
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
                    @if (!empty($persons))
                    @foreach($persons as $key => $person)
                  <tr>
                    <th scope="row">{{ $persons->firstItem() + $key }}</th>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->nic }}</td>
                    <td>{{ $person->dob }}</td>
                    <td>{{ $person->age }}</td>
                    <td>{{ $person->contact }}</td>
                    <td>{{ $person->address }}</td>
                    <td>{{ $person->religion }}</td>
                    <td><img src="{{ asset('storage/'.$person->image)}}" width='50px'/></td>
                    <td>{{ $person->nationality }}</td>
                    <td class="d-flex flex-row">
                        {{-- view --}}
                        <button class="btn btn-primary m-1"><a class="text-light" href="{{ url('view-person/'.$person->id) }}">View</a></button>
                        {{-- update --}}
                        <button class="btn btn-info m-1"><a class="text-light" href="{{ url('edit-person/'.$person->id) }}">Edit</a></button>
                        {{-- delete --}}
                             <form action="{{ route('persons.destroy',$person->id)}}" class="m-1" method="POST">
                                 @csrf
                                 @method('DELETE')
                             <button class="btn btn-outline-danger" type="submit">Delete</button>
                         </td>
                         </form>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
              {{-- custom pagination --}}
              <div class="ml-1 mt-2" >
                {{$persons->links('pagination::bootstrap-4')}}
              </div>

           </div>
        </div>
</div>
