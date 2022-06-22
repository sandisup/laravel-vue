<html>
<head>
	<title>CRUD Perpustakaan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
	$id_penerbit = $_GET['id_penerbit'];

    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");

    while($data_penerbit = mysqli_fetch_array($penerbit))
    {
    	$nama_penerbit = $data_penerbit['nama_penerbit'];
    	$email = $data_penerbit['email'];
    	$telp = $data_penerbit['telp'];
    	$alamat = $data_penerbit['alamat'];
    }
?>
 
<body>
<h1>Edit Penerbit</h1>
	<br/>
 
	<form action="edit_penerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		<label>Id Penerbit</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="id_penerbit" value="<?php echo $id_penerbit; ?>" disabled>
		</div>

		<label>Nama Penerbit</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>">
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
			<a href="penerbit.php" class="btn btn-danger" role="button">Batal</a>
			<input class="btn btn-success " type="submit" name="update" value="Update">
		</div>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_penerbit = $_GET['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit';");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>