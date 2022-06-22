<html>
<head>
	<title>CRUD Perpustakaan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
	$id_pengarang = $_GET['id_pengarang'];

    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

    while($data_pengarang = mysqli_fetch_array($pengarang))
    {
    	$nama_pengarang = $data_pengarang['nama_pengarang'];
    	$email = $data_pengarang['email'];
    	$telp = $data_pengarang['telp'];
    	$alamat = $data_pengarang['alamat'];
    }
?>
 
<body>
<h1>Edit Pengarang</h1>
	<br/>
 
	<form action="edit_pengarang.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
		<label>Id pengarang</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="id_pengarang" value="<?php echo $id_pengarang; ?>" disabled>
		</div>

		<label>Nama pengarang</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>">
		</div>

		<label>Email</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
		</div>

		<label>No. Telepon</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="telp" value="<?php echo $telp; ?>">
		</div>

		<label>Alamat</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
		</div>

		<br>
		<div>
			<a href="pengarang.php" class="btn btn-danger" role="button">Batal</a>
			<input class="btn btn-success " type="submit" name="update" value="Update">
		</div>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_pengarang = $_GET['id_pengarang'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang';");
			
			header("Location:pengarang.php");
		}
	?>
</body>
</html>