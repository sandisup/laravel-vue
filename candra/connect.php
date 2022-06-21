<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "perpustakaan";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check Connection
    if(!$conn){
        die("Connection Failed : " . $mysqli_connect_error());
    } 
    // else {
    //     echo "Koneksi Berhasil";
    // }

    $sql = "SELECT * FROM anggota";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "Anggota : ".$row["nama"]." ".$row["email"]."<br>";
        }

    } else{
        echo "0 Result";
    }

    echo"<br><br>";

    $sql = "SELECT isbn, judul, penerbit.nama_penerbit
            FROM `buku` 
            join penerbit ON buku.id_penerbit = penerbit.id_penerbit";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "Buku : ".$row["isbn"]." || ".$row["judul"]." || ".$row["nama_penerbit"]."<br>";
        }

    } else{
        echo "0 Result";
    }
?>