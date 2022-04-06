<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Edit Mahasiswa</h2>
    <hr>
    <form action="http://192.168.56.69:8080/api/mahasiswa" method="post">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe">
      </div>
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" placeholder="1234567890">
      </div>
      <div class="mb-3">
        <label for="prodi" class="form-label">Prodi</label>
        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Teknologi Rekayasa Perangkat Lunak">
      </div>
      <button type="submit" class="btn btn-success">Save</button>
    </form>
  </div>
  <h2>Create Mahasiswa</h2>
  <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}"><br>
    <label for="nim">NIM</label>
    <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}"><br>
    <label for="prodi">Prodi</label>
    <input type="text" name="prodi" id="prodi" value="{{ $mahasiswa->prodi }}">
    <button type="submit">Create</button>
  </form>
</body>
</html>