@extends('users.layout')
<style>
    @media only screen and (max-width: 600px) {
      .main-section>h3 {
        overflow: hidden;
        font-size: 90%;
        gap: 2px;
      }
    }
    </style>

<div class="main-section mt-4 d-flex bg-info mx-5 rounded justify-content-between px-4 overflow-auto">
    <h3 class="py-3">Registered count : 20</h3>
    <h3 class="py-3">Data Viewers : 30</h3>
    <h3 class="py-3">Data Operators : 23</h3>
</div>
