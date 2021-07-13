<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from buku where id ='$id'");

//mengalihkan halaman ke index.php
header("location: main.php");

?>