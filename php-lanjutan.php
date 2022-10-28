<?php
    // $nama = "Okta";

    /*
    echo "Nama saya $nama<br>";
    echo "Nama saya $nama<br>";
    echo "Nama saya $nama<br>";
    echo "Nama saya $nama<br>";
    */


    // perulangan

    // for
    // $no = 10;

     /*
    for ($i=0; $i<$no; $i++){
        $n = $i + 1;
        echo $n." ".$nama."<br>";
    }
    */

    // while
    // $no = 10;
    // $i = 0;

    /*
    while ($i < $no){
        $n = $i + 1;
        echo $n." ".$nama."<br>";
        $i++;
    }
    */

    // do while
    // $no = 10;
    // $i = 0;

    /*
    do {
        $n = $i + 1;
        echo $n." ".$nama."<br>";
        $i++;
    } while ($i < $no)
    */

    // foreach

    // $data = array("BMW", "Aston Martin" ,"Lamborghini" ,"Mercedes Benz" ,"Mazda");

    // echo $data[1];

    /*
    foreach($data as $value) {
        echo $value."<br>";
    }
    */

    
    // Percabangan

    // if else
    // $nama = "drum";

    /*
    if ($nama == "drum") {
        echo "Jika benda itu adalah ".$nama." maka benda itu milik saya";
    } else {
        echo "Jika benda itu adalah ".$nama." maka benda itu bukan milik saya";
    }
    */

    // switch
    // $nama = "drum";

    /*
    switch($nama) {
        case "drum";
            $pesan = "Jika benda itu adalah ".$nama." maka benda itu milik saya";
        break;
        default;
            $pesan = "Jika benda itu adalah ".$nama." maka benda itu bukan milik saya";
    }

    echo $pesan;
    */

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
    <h1>Input nama dan diulang</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label>Nama</label>
        <input type="text" name="nama">
        <label>Jumlah</label>
        <input type="text" name="no">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
        if(!empty($_POST['submit'])) {

            switch($_POST['nama']) {
                case "drum":
                    $pesan = "Jika benda itu adalah ".$_POST['nama']." maka benda itu milik saya";
                break;
                case "Gitar":
                    $pesan = "Jika benda itu adalah ".$_POST['nama']." maka benda itu juga merupakan milik saya";
                break;
                default:
                    $pesan = "Jika benda itu adalah ".$_POST['nama']." maka benda itu bukan milik saya";
            
            }

            for ($i=0;$i<$_POST['no'];$i++) {
                echo $pesan."<br>";
            }

        } else {
            echo "Anda belum input nama dan jumlah.";
        }
    ?>
</body>
</html>