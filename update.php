<?php

if (isset($_GET['id'])) {

  $id = $_GET['id'];

  // koneksi dengan mysql
  $con = mysqli_connect("localhost","root","","fakultas");

  // cek koneksi
  if (mysqli_connect_errno()) {
      echo "gagal konek ke MySQL: " . mysqli_connect_error();
      exit();
  } else {
      echo "koneksi berhasil";
  }

  // membaca data dari table mysql
  $query = "SELECT * FROM mahasiswa WHERE id=$id";

  // tampilkan data dengan menjalankan sql query
  $result = mysqli_query($con,$query);
  $mahasiswa = [];
  if ($result){
      // $row = mysqli_fetch_assoc($result);

      // var_dump($row);
      // echo $row["nama"];
      // echo $row["alamat"];

      while($row = mysqli_fetch_assoc($result)) {
          // echo "<br>" . $row["nama"];
          $mahasiswa = $row;
      }
      mysqli_free_result($result);
  }

  // tutup koneksi mysql
  mysqli_close($con);

}

  // tangkap data dari form submit
if (isset($_POST["submit"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $id = $_POST['id'];

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
    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', id_jurusan='$id_jurusan', 
    tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat' 
    WHERE id = $id ";

        //jalankan query
    if (mysqli_query($con, $sql)) {
        echo "Data berhasil diubah";
    } else {
        echo "Ada error ". mysqli_error($con);
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
    <title>Update Data Mahasiswa</title>
</head>

<body>
    <h1>Update Data Mahasiswa</h1>
    <?php //var_dump($mahasiswa); ?>
    <form action="" method="post">
        NIM: <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>"><br>
        Nama: <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>"><br>
        ID Jurusan: <input type="number" name="id_jurusan" value="<?php echo $mahasiswa['id_jurusan']; ?>"><br>
        Jenis Kelamin: <input type="text" name="jenis_kelamin" value="<?php echo $mahasiswa['jenis_kelamin']; ?>"><br>
        Tempat Lahir: <input type="text" name="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir']; ?>"><br>
        Tanggal Lahir (yy-mm-dd): <input type="text" name="tanggal_lahir" value="<?php echo $mahasiswa['tanggal_lahir']; ?>"><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $mahasiswa['alamat']; ?>"><br>
        <input type="number" name="id" value="<?php echo $mahasiswa['id'] ?>" hidden>
        <button type="submit" name="submit">Update Data</button>
    </form>
</body>

</html>