<?php
    include_once("connect.php");
    $buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
?>

<html>
<head>
    <title>CRUD Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <ul class="nav nav-pills nav-fill" style="width: 50%;">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Buku</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="penerbit.php">Penerbit</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pengarang.php">Pengarang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="katalog.php">Katalog</a>
    </li>
    </ul>

    <br>
    <a class="btn btn-success" href="add.php">Add Buku</a>
    <br><br>

    <table class="table" style="width: 80%;" border="1">
        <tr>
            <td>ISBN</td>
            <td>Judul</td>
            <td>Tahun</td>
            <td>Pengarang</td>
            <td>Penerbit</td>
            <td>Katalog</td>
            <td>Stok</td>
            <td>Harga Pinjam</td>
            <td>Aksi</td>
        </tr>
        
        <?php
            while($buku_data = mysqli_fetch_array($buku)){
                echo "<tr>";
                    echo "<td>".$buku_data['isbn']."</td>";
                    echo "<td>".$buku_data['judul']."</td>";
                    echo "<td>".$buku_data['tahun']."</td>";
                    echo "<td>".$buku_data['nama_pengarang']."</td>";
                    echo "<td>".$buku_data['nama_penerbit']."</td>";
                    echo "<td>".$buku_data['nama_katalog']."</td>";
                    echo "<td>".$buku_data['qty_stok']."</td>";
                    echo "<td>".$buku_data['harga_pinjam']."</td>";
                    echo "<td><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit<a> | 
                                <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>