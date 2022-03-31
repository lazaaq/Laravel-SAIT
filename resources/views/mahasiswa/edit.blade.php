<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
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