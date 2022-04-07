@extends('layouts.main')

@section('css')
<style>
  body {
    height: fit-content!important;
    padding: 5rem 0;
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
  <h1 class="text-center">Search Books</h1>
  <hr>
  <form action="" method="get">
    <div class="d-flex">
      <div class="mb-3 col-6">
        <label for="query" class="form-label">Query</label>
        <input type="text" class="form-control" id="query" name="query" placeholder="Query" value="{{ $query }}">
      </div>
      <div class="mb-3 col-6">
        <label for="page" class="form-label">Page</label>
        <input type="text" class="form-control" id="query" name="page" placeholder="Page" value="{{ $page }}">
      </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </form>
  @if($books)
  <div class="d-flex justify-content-center align-items-center w-100 h-100">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Subtitle</th>
          <th scope="col">ISBN13</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">URL</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books->books as $book)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $book->title }}</td>
          <td>{{ $book->subtitle }}</td>
          <td>{{ $book->isbn13 }}</td>
          <td>{{ $book->price }}</td>
          <td>
            <a href="{{ $book->image }}" class="badge rounded-pill bg-primary" target="_blank">View</a>
          </td>
          <td>
            <a href="{{ $book->url }}" class="badge rounded-pill bg-success" target="_blank">View</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>
@endsection