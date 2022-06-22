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
<div class="container" style="padding: 5em 3em;">
  <h2 class="lead display-4 text-center">Your Wishlist</h2>
  <div class="my-5 text-end">
    <a href="{{ route('bookstore.index') }}">Ke Bookstore</a>
  </div>

  <h3 class="mt-5">WISH</h3>
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
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($wishlistWish as $wishlist)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $wishlist->title }}</td>
          <td>{{ $wishlist->subtitle }}</td>
          <td>{{ $wishlist->isbn }}</td>
          <td>{{ $wishlist->price }}</td>
          <td>
            <a href="{{ $wishlist->image }}" class="badge rounded-pill bg-primary" target="_blank">View</a>
          </td>
          <td>
            <a href="{{ $wishlist->url }}" class="badge rounded-pill bg-success" target="_blank">View</a>
          </td>
          <td>{{ $wishlist->status }}</td>
          <td class="d-flex">
            <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="badge bg-danger border-0">Hapus</button>
            </form>
            <form action="{{ route('wishlist.update', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="bought">
              <button type="submit" class="badge bg-success border-0 ms-1">Move Forward</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <hr>

  <h3 class="mt-5">BOUGHT</h3>
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
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($wishlistBought as $wishlist)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $wishlist->title }}</td>
          <td>{{ $wishlist->subtitle }}</td>
          <td>{{ $wishlist->isbn }}</td>
          <td>{{ $wishlist->price }}</td>
          <td>
            <a href="{{ $wishlist->image }}" class="badge rounded-pill bg-primary" target="_blank">View</a>
          </td>
          <td>
            <a href="{{ $wishlist->url }}" class="badge rounded-pill bg-success" target="_blank">View</a>
          </td>
          <td>{{ $wishlist->status }}</td>
          <td class="d-flex">
            <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="badge bg-danger border-0">Hapus</button>
            </form>
            <form action="{{ route('wishlist.update', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="wish">
              <button type="submit" class="badge bg-warning border-0 ms-1">Move Backward</button>
            </form>
            <form action="{{ route('wishlist.update', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="reading">
              <button type="submit" class="badge bg-success border-0 ms-1">Move Forward</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <hr>

  <h3 class="mt-5">READING</h3>
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
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($wishlistReading as $wishlist)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $wishlist->title }}</td>
          <td>{{ $wishlist->subtitle }}</td>
          <td>{{ $wishlist->isbn }}</td>
          <td>{{ $wishlist->price }}</td>
          <td>
            <a href="{{ $wishlist->image }}" class="badge rounded-pill bg-primary" target="_blank">View</a>
          </td>
          <td>
            <a href="{{ $wishlist->url }}" class="badge rounded-pill bg-success" target="_blank">View</a>
          </td>
          <td>{{ $wishlist->status }}</td>
          <td class="d-flex">
            <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="badge bg-danger border-0">Hapus</button>
            </form>
            <form action="{{ route('wishlist.update', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="bought">
              <button type="submit" class="badge bg-warning border-0 ms-1">Move Backward</button>
            </form>
            <form action="{{ route('wishlist.update', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="finished">
              <button type="submit" class="badge bg-success border-0 ms-1">Move Forward</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <hr>

  <h3 class="mt-5">FINISHED</h3>
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
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($wishlistFinished as $wishlist)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $wishlist->title }}</td>
          <td>{{ $wishlist->subtitle }}</td>
          <td>{{ $wishlist->isbn }}</td>
          <td>{{ $wishlist->price }}</td>
          <td>
            <a href="{{ $wishlist->image }}" class="badge rounded-pill bg-primary" target="_blank">View</a>
          </td>
          <td>
            <a href="{{ $wishlist->url }}" class="badge rounded-pill bg-success" target="_blank">View</a>
          </td>
          <td>{{ $wishlist->status }}</td>
          <td class="d-flex">
            <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="badge bg-danger border-0">Hapus</button>
            </form>
            <form action="{{ route('wishlist.update', $wishlist->id) }}" method="post" class="inline-block">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="reading">
              <button type="submit" class="badge bg-warning border-0 ms-1">Move Backward</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<style>
  hr {
    background-color: green;
    height: 6px!important;
    border-radius: 6px;
  }
</style>
@endsection