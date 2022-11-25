<?php
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
    $query = "select*from mahasiswa";

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
            $mahasiswa[] = $row;
        }
        mysqli_free_result($result);
    }

    // tutup koneksi mysql
    mysqli_close($con);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1" style="width: 100%;">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
        </tr>
        <?php foreach($mahasiswa as $value): ?>
        <tr>
            <td><?php echo $value["nim"]; ?></td>
            <td><?php echo $value["nama"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>