<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tiket_reporting");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	};
	return $rows;
};


function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM laporan_logending where id = $id");

    return mysqli_affected_rows($conn);
}

?>