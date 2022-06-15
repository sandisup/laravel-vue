<html>
<head>
	<title>Add Buku</title>
</head>

<?php
	include_once("connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>
	<a href="katalog.php">Go to Katalog</a>
	<br/><br/>

    <form action="add_katalog.php" method="post" name="form2">
		<table width="25%" border="0">
        <tr> 
				<td>ID</td>
				<td><input type="text" name="id_katalog"></td>
			</tr>
        <tr> 
				<td>Nama Katalog</td>
				<td>
					<select name="nama">
						<?php 
						    while($katalog_data = mysqli_fetch_array($katalog)) {         
						    	echo "<option value='".$katalog_data['nama']."'>".$katalog_data['nama']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>  
            <tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>   

    <?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_katalog = $_POST['id_katalog'];
            $nama = $_POST['nama'];

			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama');");
			
			header("Location:katalog.php");
		}
	?>


</body>
</html>