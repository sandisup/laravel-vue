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
	<h1>Tambah Penerbit</h1>
	<br/><br/>
 
	<form action="add_penerbit.php" method="post" name="form1">
		<label>Id Penerbit</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="id_penerbit">
		</div>

		<label>Nama Penerbit</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_penerbit">
		</div>

		<label>email</label>
		<div class="col-sm-8">
			<input type="email" class="form-control" name="email">
		</div>

		<label>No. Telepon</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="telp">
		</div>

		<label>Alamat</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="alamat">
		</div>

		<br>
		<div>
			<a href="penerbit.php" class="btn btn-danger" role="button">Batal</a>
			<input class="btn btn-success " type="submit" name="Submit" value="Simpan">
		</div>

	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>