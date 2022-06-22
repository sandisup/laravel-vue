<?php
    include_once("connect.php");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog ORDER BY id_katalog ASC");
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

    <a href="add_katalog.php">Add Katalog</a>
    <br><br>

    <table class="table" style="width: 50%;" border="1">
        <tr align="center">
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