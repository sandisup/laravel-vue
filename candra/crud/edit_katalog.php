<html>
<head>
	<title>CRUD Perpustakaan</title>
</head>

<?php
	include_once("connect.php");
	$id_katalog = $_GET['id_katalog'];

    $katalog = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");

    while($data_katalog = mysqli_fetch_array($katalog))
    {
    	$nama = $data_katalog['nama'];
    }
?>
 
<body>
	<a href="katalog.php">Kembali</a>
	<br/><br/>
 
	<form action="edit_katalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Id Katalog</td>
				<td style="font-size: 11pt;"><?php echo $id_katalog; ?> </td>
			</tr>
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_katalog = $_GET['id_katalog'];
			$nama = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>