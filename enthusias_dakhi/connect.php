<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($mysqli);

$sql = "SELECT * FROM buku";
$result = $mysqli->query($sql);

if ($result-> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        echo "Buku : " . $row["isbn"]. " " . $row["judul"]. "<br>";
    }
} else {
    echo "0 result";
}
//$mysqli->close();

$sql = "SELECT * FROM anggota";
$result = $mysqli->query($sql);

if ($result-> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        echo "anggota : " . $row["nama"]. " " . $row["sex"]. "<br>";
    }
} else {
    echo "0 result";
}
$mysqli->close();
?>