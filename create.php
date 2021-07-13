<?php
//include koneksi databse
include './koneksi.php';

//menerima data yang dikirim dari form
$namabuku = $_POST['Namabuku'];
$kategori = $_POST['Kategori'];
$penerbit = $_POST['Penerbit'];
$harga = $_POST['Harga'];
$diskon = $_POST['Diskon'];

//menginput data ke database
mysqli_query($koneksi, "INSERT INTO buku values('','$namabuku','$kategori','$penerbit','$harga','$diskon')");
// mysqli_query($koneksi,"INSERT INTO buku(namaBuku,kategoriBuku,penerbit,harga,diskon) VALUES('$namabuku','$kategori','$penerbit,'$harga','$diskon')");
//mengembalikan ke halaman awal
header("Location: ./main.php");

