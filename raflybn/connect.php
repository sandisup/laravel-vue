<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (!$conn) {
	die("connection failed: ". mysqli_conect_error());
}

//echo "connected successfully";
//mysqli_close($conn);

$sql = "select * FROM anggota";
$result = $conn->query($sql);

if($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		echo "buku : " . $row["nama_anggota"]. " ". $row["alamat"]. " ". $row["no_hp"]. ""."<br>";
	}
}else {
	echo "0 results";
}	
$conn->close();


?>