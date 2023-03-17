<?php 
$koneksi = mysqli_connect("localhost","root","","tiket_reporting");
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
