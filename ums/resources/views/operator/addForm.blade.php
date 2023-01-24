@extends('users.layout')
@section('content')

<div>
  @include('layouts.header')

  <button class="btn btn-warning mt-3 mx-5 px-4" >
    <a class="text-light" href="{{url('/operator-dashboard')}}">Back</a>
     </button>

    <div class="mx-5 border mt-3 rounded">
        <form class="px-3 my-3" enctype="multipart/form-data" action="{{route('add.person')}}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                @if ($errors->has('name'))
                     <span class="text-danger px-4">{{ $errors->first('name') }}</span>
                  @endif
              </div>
              <div class="form-group col-md-6">
                <label for="nic">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="98XXXXXXXV">
                @if ($errors->has('nic'))
                     <span class="text-danger px-4">{{ $errors->first('nic') }}</span>
                  @endif
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob"
                        name="dob">
                  @if ($errors->has('dob'))
                     <span class="text-danger px-4">{{ $errors->first('dob') }}</span>
                  @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Age">
                @if ($errors->has('age'))
                    <span class="text-danger px-4">{{ $errors->first('age') }}</span>
                 @endif
                  </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
              @if ($errors->has('address'))
                    <span class="text-danger px-4">{{ $errors->first('address') }}</span>
                 @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Contact No</label>
                  <input type="number" class="form-control" id="contact" name="contact" placeholder="077XXXXXXX">
                  @if ($errors->has('contact'))
                  <span class="text-danger px-4">{{ $errors->first('contact') }}</span>
               @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Image upload</label>
                    <input type="file" class="form-control" id="image" name="image" />
                    @if ($errors->has('image'))
                  <span class="text-danger px-4">{{ $errors->first('image') }}</span>
               @endif
              </div>
            </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Religion</label>
                  <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion">
                  @if ($errors->has('religion'))
                  <span class="text-danger px-4">{{ $errors->first('religion') }}</span>
               @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="nic">Nationality</label>
                  <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality">
                  @if ($errors->has('nationality'))
                  <span class="text-danger px-4">{{ $errors->first('nationality') }}</span>
               @endif
                </div>
              </div>

            <button type="submit" class="btn btn-primary">Check Out</button>
          </form>
    </div>
</div>

@endsection
