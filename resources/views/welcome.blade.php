@extends('layouts.main')

@section('css')
<style>
  body {
      background-color: #F4F4F2;
  }
  .mybutton {
      padding: 20px;
      border-radius: 6px;
      color: black;
      text-decoration: none;
      margin: 5px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
  }
  .mybutton:hover {
      color: white;
      background-color: #495464;
      transition: 0.3s;
  }
  .btn-mahasiswa {
      background-color: #E8E8E8;
  }
  .btn-bookstore {
      background-color: #BBBFCA;
  }
</style>
@endsection

@section('contents')
<div class="container w-100 h-100">
  <div class="d-flex justify-content-center align-items-center w-100 h-100">
      <a href="/mahasiswa" class="mybutton btn-mahasiswa">Mahasiswa</a>
      <a href="/bookstore" class="mybutton btn-bookstore">Bookstore</a>
  </div>
</div>
@endsection