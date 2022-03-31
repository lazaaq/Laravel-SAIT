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
  <form action="http://192.168.56.69:8080/api/mahasiswa" method="post">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama"><br>
    <label for="nim">NIM</label>
    <input type="text" name="nim" id="nim"><br>
    <label for="prodi">Prodi</label>
    <input type="text" name="prodi" id="prodi">
    <button type="submit">Create</button>
  </form>
</body>
</html>