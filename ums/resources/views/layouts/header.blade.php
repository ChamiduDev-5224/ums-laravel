@extends('users.layout')

<style>
    @media only screen and (max-width: 600px) {
     .header-h2 {
        font-size: 90%;
      }
      .auth-span{
        font-size: 80%;
      }
    }
    </style>

<div class="bg-primary d-flex flex-row align-items-baseline">
    <h2 class="header-h2 text-center text-light mr-auto p-2">User Management System</h2>
    <span class="auth-span text-light p-2 font-bold">
        {{-- user auth --}}
     @php
         $data=session('email');
         echo $data
     @endphp
   </span>
   {{-- logout button --}}
    <button class="btn btn-dark m-2"><a class="text-light" href="{{ url('logout') }}">Log out</a></button>
</div>

