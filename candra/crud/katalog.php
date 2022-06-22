<?php
    include_once("connect.php");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog ORDER BY id_katalog ASC");
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
        <a class="nav-link" href="pengarang.php">Pengarang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Katalog</a>
    </li>
    </ul>

    <br>
    <a class="btn btn-success" href="add_katalog.php">Add Katalog</a>
    <br><br>

    <table class="table" style="width: 50%;" border="1">
        <tr>
            <td>Id Katalog</td>
            <td>Nama Katalog</td>
            <td>Aksi</td>
        </tr>
        
        <?php
            while($data_katalog = mysqli_fetch_array($katalog)){
                echo "<tr>";
                    echo "<td>".$data_katalog['id_katalog']."</td>";
                    echo "<td>".$data_katalog['nama']."</td>";
                    echo "<td><a class='btn btn-primary' href='edit_katalog.php?id_katalog=$data_katalog[id_katalog]'>Edit<a> | 
                                <a class='btn btn-danger' href='delete_katalog.php?id_katalog=$data_katalog[id_katalog]'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>