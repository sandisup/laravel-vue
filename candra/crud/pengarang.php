<?php
    include_once("connect.php");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang ORDER BY id_pengarang ASC");
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
        <a class="nav-link" href="index.php">Buku</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="penerbit.php">Penerbit</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Pengarang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="katalog.php">Katalog</a>
    </li>
    </ul>

    <br>
    <a class="btn btn-success" href="add_pengarang.php">Add Pengarang</a>
    <br><br>

    <table class="table" style="width: 80%;" border="1">
        <tr>
            <td>Id Pengarang</td>
            <td>Nama Pengarang</td>
            <td>Email</td>
            <td>Telepon</td>
            <td>Alamat</td>
            <td>Aksi</td>
        </tr>
        
        <?php
            while($data_pengarang = mysqli_fetch_array($pengarang)){
                echo "<tr>";
                    echo "<td>".$data_pengarang['id_pengarang']."</td>";
                    echo "<td>".$data_pengarang['nama_pengarang']."</td>";
                    echo "<td>".$data_pengarang['email']."</td>";
                    echo "<td>".$data_pengarang['telp']."</td>";
                    echo "<td>".$data_pengarang['alamat']."</td>";
                    echo "<td><a class='btn btn-primary' href='edit_pengarang.php?id_pengarang=$data_pengarang[id_pengarang]'>Edit<a> | 
                                <a class='btn btn-danger' href='delete_pengarang.php?id_pengarang=$data_pengarang[id_pengarang]'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>