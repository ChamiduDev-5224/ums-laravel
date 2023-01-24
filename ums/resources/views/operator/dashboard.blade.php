@extends('users.layout')
@section('content')

<div>
     <div>
        @include('layouts.header')
     </div>
        <div>
            @include('layouts.panel')
        </div>
        <div class="d-flex flex-row align-items-baseline">
            <button class="btn btn-primary mx-5 mt-3"><a href="{{url('operator-dashboard/add-new')}}" class="text-light">Add New Person</a></button>
                @if ($message = Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Well done!</strong> {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
               @endif
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
                    {{-- <img src="{{ asset('storage/2/images/'.$user->profile_image) }}" /> --}}
                    <td><img src="{{ asset('storage/'.$person->image)}}" width='50px'/></td>
                    <td>{{ $person->nationality }}</td>
                    <td class="d-flex flex-row">
                        <button class="btn btn-primary m-1">View</button>
                        <button class="btn btn-info m-1"><a class="text-light" href="{{ url('edit-person/'.$person->id) }}">Edit</a></button>
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
              <div class="paginate">
                <div class="d-flex flex-row">
                    {{ $persons->links('pagination::bootstrap-4') }}
                </div>
            </div>
           </div>
        </div>
</div>