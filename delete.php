<?php

    // tangkap data dari form submit
    if (isset($_GET["id"])) {
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

        //buat sql query untuk delete ke database
        //buat query dan jalankan
        $sql = "DELETE FROM mahasiswa WHERE id = $id";

            //jalankan query
        if (mysqli_query($con, $sql)) {
            echo "Data berhasil di hapus ";
        } else {
            echo "Ada error ". mysqli_error($con);
        }

        mysqli_close($con);
    }

?>