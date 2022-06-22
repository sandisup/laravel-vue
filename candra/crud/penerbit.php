<?php
    include_once("connect.php");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY id_penerbit ASC");
?>

<html>
<head>
    <title>CRUD Perpustakaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
    <center>
        <a href="index.php">Buku </a> |
        <a href="penerbit.php"> Penerbit </a> |
        <a href="pengarang.php"> Pengarang </a> |
        <a href="katalog.php"> Katalog</a>
        <hr>
    </center>

    <a href="add_penerbit.php">Add Penerbit</a>
    <br><br>

    <table class="table" style="width: 80%;" border="1">
        <tr align="center">
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