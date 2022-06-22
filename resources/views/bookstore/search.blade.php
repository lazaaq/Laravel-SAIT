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
  <h1 class="text-center lead display-4">Search Books</h1>
  <div class="my-5">
    <a href="{{ route('wishlist.index') }}">Ke Wishlist</a>
  </div>
  <hr>
  <form action="" method="get">
    <div class="w-100">
      <div class="mb-3 col-6 mx-auto row">
        <label for="query" class="form-label text-center fw-bolder">Book Title</label>
        <input type="text" class="form-control" id="query" name="query" placeholder="Title" value="{{ $query }}">
        <input type="hidden" name="page" value="1" id="page">
        <button type="submit" class="btn btn-primary mx-auto mt-2" style="width: fit-content!important;">Search</button>
      </div>
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
          <th scope="col">Harga</th>
          <th scope="col">Image</th>
          <th scope="col">URL</th>
          <th scope="col">Aksi</th>
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
            <a href="{{ $book->url }}" class="badge rounded-pill bg-warning text-dark" target="_blank">View</a>
          </td>
          <td>
            <form action="{{ route('wishlist.store') }}" method="post">
              @csrf
              <input type="hidden" name="title" value="{{ $book->title }}">
              <input type="hidden" name="subtitle" value="{{ $book->subtitle }}">
              <input type="hidden" name="isbn" value="{{ $book->isbn13 }}">
              <input type="hidden" name="price" value="{{ ltrim($book->price,'$'); }}">
              <input type="hidden" name="image" value="{{ $book->image }}">
              <input type="hidden" name="url" value="{{ $book->url }}">
              <input type="hidden" name="status" value="wish">
              <button type="submit" class="badge bg-success border-0">Add to Wishlist</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif

  @if($query)
  <div class="w-100 d-flex">
    <form action="" method="get" class="ms-auto">
      <input type="hidden" class="form-control" id="query" name="query" placeholder="Title" value="{{ $query }}">
      <input type="hidden" name="page" value="{{ ($page != 1) ? $page - 1 : $page }}" id="page">
      <button type="submit" class="btn btn-primary mx-auto mt-2" style="width: fit-content!important;">Previous</button>
    </form>
    <form action="" method="get" class="ms-2">
      <input type="hidden" class="form-control" id="query" name="query" placeholder="Title" value="{{ $query }}">
      <input type="hidden" name="page" value="{{ $page + 1 }}" id="page">
      <button type="submit" class="btn btn-primary mx-auto mt-2" style="width: fit-content!important;">Next</button>  
    </form>
  </div>
  @endif
</div>
@endsection