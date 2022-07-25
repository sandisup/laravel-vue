>?php
$serverusername = "localhost";
$database = "perpustakaan";
$username = "root"; 
$password = "";

// create connection
$conn = mysqli_connect($serverusername, $database, $username, $password);

// check connection
if ($conn) {
    die("connection failed: " . mysqli_connect_error"(();
}

echo "connected_sucefully";
mysqli_close($conn);

?>