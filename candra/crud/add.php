<html>
<head>
	<title>Add Buku</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");
?>
 
<body>
	<h1>Tambah Buku</h1>
	<br/>

	<form action="add.php" method="post" name="form1">
		<label>ISBN</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="isbn">
		</div>

		<label>Judul</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="judul">
		</div>
		
		<label>Tahun</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="tahun">
		</div>

		<label>Penerbit</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_penerbit">
				<?php 
					while($data_penerbit = mysqli_fetch_array($penerbit)) {         
						echo "<option value='".$data_penerbit['id_penerbit']."'>".$data_penerbit['nama_penerbit']."</option>";
					}
				?>
			</select>
		</div>

		<label>Pengarang</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_pengarang">
				<?php 
					while($data_pengarang = mysqli_fetch_array($pengarang)) {         
						echo "<option value='".$data_pengarang['id_pengarang']."'>".$data_pengarang['nama_pengarang']."</option>";
					}
				?>
			</select>
		</div>

		<label>Katalog</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_katalog">
				<?php 
					while($data_katalog = mysqli_fetch_array($katalog)) {         
						echo "<option value='".$data_katalog['id_katalog']."'>".$data_katalog['nama']."</option>";
					}
				?>
			</select>
		</div>

		<label>Qty Stok</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="qty_stok">
		</div>

		<label>Harga Pinjam</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="harga_pinjam">
		</div>

		<br>
		<div>
			<a href="index.php" class="btn btn-danger" role="button">Batal</a>
			<input class="btn btn-success " type="submit" name="Submit" value="Simpan">
		</div>

	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$isbn = $_POST['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
			
			header("Location:index.php");
		}
	?>
</body>
</html>