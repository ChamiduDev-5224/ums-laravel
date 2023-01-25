@extends('users.layout')
@section('content')
@php
$role=session('role');
@endphp

<div>
  @include('layouts.header')
  {{-- back button --}}
  <button class="btn btn-warning mt-5 mx-5 px-4" >
   @if ($role=='data_entry')
   <a class="text-light" href="{{url('/operator-dashboard')}}">Back</a>
   @else
   <a class="text-light" href="{{url('/viewer-dashboard')}}">Back</a>
   @endif
    </button>
    
    {{-- data view component --}}
    <div class="mx-5 border mt-5 rounded">
        <form class="px-3 my-3">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{$person->name}}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="nic">NIC</label>
                <input type="text" class="form-control" value="{{$person->nic}}" readonly>
              </div>
              <div class="form-group col-md-4">
                  <label class="form-label">Date of Birth</label>
                  <input type="text" class="form-control" value="{{$person->dob}}" readonly>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">Age</label>
                    <input type="number" class="form-control" value="{{$person->age}}" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" value="{{$person->address}}" readonly>
                  </div>
                      <div class="form-group col-md-4">
                        <label for="name">Contact No</label>
                        <input type="number" class="form-control" value="{{$person->contact}}" readonly>
                      </div>
            </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="name">Religion</label>
                  <input type="text" class="form-control" value="{{$person->religion}}" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="nic">Nationality</label>
                  <input type="text" class="form-control" value="{{$person->nationality}}" readonly>
                </div>
                <div class="form-group col-md-4 mt-md-3">
                <img src="{{ asset('storage/'.$person->image)}}" width="45%" class="my-auto mx-auto"/>
              </div>
              </div>
          </form>
    </div>
</div>

@endsection
