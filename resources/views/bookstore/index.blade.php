@extends('layouts.main')

@section('css')
<style>
  body {
    background-color: #FAF9F9;
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
    color: black;
    background-color: white;
    transition: 0.3s;
  }
  .btn-new {
    background-color: #ADD2C9;
  }
  .btn-search {
    background-color: #5EA3A3;
  }
  .btn-books {
    background-color: #488B8F;
  }
</style>
@endsection

@section('contents')
<div class="container w-100 h-100">
  <div class="d-flex justify-content-center align-items-center w-100 h-100">
      <a href="{{ route('bookstore.new') }}" class="mybutton btn-new">New</a>
      <a href="{{ route('bookstore.search') }}" class="mybutton btn-search">Search</a>
      <a href="{{ route('bookstore.books') }}" class="mybutton btn-books">Books</a>
  </div>
</div>
@endsection