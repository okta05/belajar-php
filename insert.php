<?php

// tangkap data dari form submit
if (isset($_POST["submit"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    // koneksi dengan mysql
$con = mysqli_connect("localhost","root","","fakultas");

// cek koneksi
if (mysqli_connect_errno()) {
    echo "gagal konek ke MySQL: " . mysqli_connect_error();
    exit();
} else {
    echo "koneksi berhasil";
}

//buat sql query untuk insert ke database
//buat query dan jalankan
$sql = "insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat)
        values ($id_jurusan,'$nim', '$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat')";

    //jalankan query
if (mysqli_query($con, $sql)) {
    echo "Data berhasil ditambah";
} else {
    echo "Ada error ". mysqli_error();
}

mysqli_close($con);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        NIM: <input type="text" name="nim"><br>
        Nama: <input type="text" name="nama"><br>
        ID Jurusan: <input type="number" name="id_jurusan"><br>
        Jenis Kelamin: <input type="text" name="jenis_kelamin"><br>
        Tempat Lahir: <input type="text" name="tempat_lahir"><br>
        Tanggal Lahir (yy-mm-dd): <input type="text" name="tanggal_lahir"><br>
        Alamat: <input type="text" name="alamat"><br>
        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>