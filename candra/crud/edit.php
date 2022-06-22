<html>
<head>
	<title>Edit Buku</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
	$isbn = $_GET['isbn'];

	$buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");

    while($buku_data = mysqli_fetch_array($buku))
    {
    	$judul = $buku_data['judul'];
    	$isbn = $buku_data['isbn'];
    	$tahun = $buku_data['tahun'];
    	$id_penerbit = $buku_data['id_penerbit'];
    	$id_pengarang = $buku_data['id_pengarang'];
    	$id_katalog = $buku_data['id_katalog'];
    	$qty_stok = $buku_data['qty_stok'];
    	$harga_pinjam = $buku_data['harga_pinjam'];
    }
?>
 
<body>
	<h1>Edit Buku</h1>
	<br/>
 
	<form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
		<label>ISBN</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="isbn" value="<?php echo $isbn; ?>" disabled>
		</div>

		<label>Judul</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>">
		</div>

		<label>Tahun</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="tahun" value="<?php echo $tahun; ?>">
		</div>

		<label>Penerbit</label>
		<div class="col-sm-8">
			<select type="text" class="form-control" name="id_penerbit">
				<?php 
					while($penerbit_data = mysqli_fetch_array($penerbit)) {         
				    	echo "<option ".($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '')." value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
				    }
				?>
			</select>
		</div>

		<label>Pengarang</label>
		<div class="col-sm-8">
			<select type="text" class="form-control" name="id_pengarang">
				<?php 
					while($pengarang_data = mysqli_fetch_array($pengarang)) {         
				    	echo "<option ".($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '')." value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
				    }
				?>
			</select>
		</div>

		<label>katalog</label>
		<div class="col-sm-8">
			<select type="text" class="form-control" name="id_katalog">
				<?php 
					while($katalog_data = mysqli_fetch_array($katalog)) {         
				    	echo "<option ".($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '')." value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
				    }
				?>
			</select>
		</div>

		<label>Qty Stok</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="qty_stok" value="<?php echo $qty_stok; ?>">
		</div>

		<label>Harga Pinjam</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>">
		</div>

		<br>
		<div>
			<a href="index.php" class="btn btn-danger" role="button">Batal</a>
			<input class="btn btn-success " type="submit" name="update" value="Update">
		</div>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$isbn = $_GET['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("connect.php");

			$result = mysqli_query($conn, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");
			
			header("Location:index.php");
		}
	?>
</body>
</html>