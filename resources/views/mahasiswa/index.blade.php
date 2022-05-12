<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center">Daftar Mahasiswa Lokal</h2>
      <hr>
      <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Add Mahasiswa</a>
      <table class="table table-striped table-hover">
        <thead>
          <tr>    
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mahasiswa_lokal as $mahasiswa)
          <tr>
            <td>{{ $mahasiswa->id }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->prodi }}</td>
            <td>
              <a class="badge bg-warning text-dark rounded-pill border-0" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
              <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="badge bg-danger rounded-pill border-0">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <br> <br> <br>
      <h2 class="text-center">Daftar Mahasiswa Ubuntu</h2>
      <hr>
      <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Add Mahasiswa</a>
      <table class="table table-striped table-hover">
        <thead>
          <tr>    
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mahasiswa_ubuntu as $mahasiswa)
          <tr>
            <td>{{ $mahasiswa->id }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->prodi }}</td>
            <td>
              <a class="badge bg-warning text-dark rounded-pill border-0" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
              <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="badge bg-danger rounded-pill border-0">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>