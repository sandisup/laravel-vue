<?php
    include_once("connect.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY id_penerbit ASC");
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
        <a class="nav-link active" aria-current="page" href="#">Penerbit</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pengarang.php">Pengarang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="katalog.php">Katalog</a>
    </li>
    </ul>

    <br>
    <a class="btn btn-success" href="add_penerbit.php">Add Penerbit</a>
    <br><br>

    <table class="table" style="width: 80%;" border="1">
        <tr>
            <td>Id Penerbit</td>
            <td>Nama Penerbit</td>
            <td>Email</td>
            <td>Telepon</td>
            <td>Alamat</td>
            <td>Aksi</td>
        </tr>
        
        <?php
            while($data_penerbit = mysqli_fetch_array($penerbit)){
                echo "<tr>";
                    echo "<td>".$data_penerbit['id_penerbit']."</td>";
                    echo "<td>".$data_penerbit['nama_penerbit']."</td>";
                    echo "<td>".$data_penerbit['email']."</td>";
                    echo "<td>".$data_penerbit['telp']."</td>";
                    echo "<td>".$data_penerbit['alamat']."</td>";
                    echo "<td><a class='btn btn-primary' href='edit_penerbit.php?id_penerbit=$data_penerbit[id_penerbit]'>Edit<a> | 
                                <a class='btn btn-danger' href='delete_penerbit.php?id_penerbit=$data_penerbit[id_penerbit]'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>