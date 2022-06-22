<html>
<head>
	<title>CRUD Perpustakaan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
?>
 
<body>
	<h1>Tambah Katalog</h1>
	<br/><br/>
 
	<form action="add_katalog.php" method="post" name="form1">
		<label>Id katalog</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="id_katalog">
		</div>

		<label>Nama katalog</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama">
		</div>

		<br>
		<div>
			<a href="katalog.php" class="btn btn-danger" role="button">Batal</a>
			<input class="btn btn-success " type="submit" name="Submit" value="Simpan">
		</div>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_katalog = $_POST['id_katalog'];
			$nama = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama');");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>