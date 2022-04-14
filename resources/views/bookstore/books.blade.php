@extends('layouts.main')

@section('css')
<style>
  body {
    background-color: #FAF9F9;
    padding: 5rem 0;
    height: fit-content!important;
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
<div class="container">
  <h1 class="text-center">Search Books by ISBN13</h1>
  <hr>
  <form action="" method="get">
    <div class="lead mb-2" for="isbn13">ISBN 13</div>
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="ISBN 13" name="isbn13" id="isbn13" value="{{ $isbn13 }}">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
  </form>
  @if($isbn13)
  <div>
    <div class="row mb-2">
      <div class="col-4">
        Error
      </div>
      <div class="col-4">
        {{ $books->error }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Title
      </div>
      <div class="col-4">
        {{ $books->title }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Subtitle
      </div>
      <div class="col-4">
        {{ $books->subtitle }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Authors
      </div>
      <div class="col-8">
        {{ $books->authors }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Publisher
      </div>
      <div class="col-8">
        {{ $books->publisher }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Language
      </div>
      <div class="col-8">
        {{ $books->language }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        ISBN10
      </div>
      <div class="col-8">
        {{ $books->isbn10 }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        ISBN13
      </div>
      <div class="col-8">
        {{ $books->isbn13 }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Pages
      </div>
      <div class="col-8">
        {{ $books->pages }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Year
      </div>
      <div class="col-8">
        {{ $books->year }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Rating
      </div>
      <div class="col-8">
        {{ $books->rating }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Desc
      </div>
      <div class="col-8">
        {{ $books->desc }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Price
      </div>
      <div class="col-8">
        {{ $books->price }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        Image
      </div>
      <div class="col-8">
        {{ $books->image }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        URL
      </div>
      <div class="col-8">
        {{ $books->url }}
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-4">
        PDF
      </div>
      <div class="col-8">
        @foreach ($books->pdf as $item)
        {{ $item }}
        <br>
        @endforeach
      </div>
    </div>
  </div>
  @endif
</div>
@endsection