<html>
<head>
	<title>CRUD Perpustakaan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
	<h1>Edit Katalog</h1>
	<br/>
 
	<form action="edit_katalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
		<label>Id Katalog</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="id_katalog" value="<?php echo $id_katalog; ?>" disabled>
		</div>

		<label>Nama Katalog</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
		</div>

		<br>
		<div>
			<a href="katalog.php" class="btn btn-danger" role="button">Batal</a>
			<input class="btn btn-success " type="submit" name="update" value="Update">
		</div>
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