<?php 
	include 'connectionwaduksempor.php';

	$id = $_GET['id'];

	if (hapus($id)) {
		echo "

			<script>
				alert('data berhasil dihapus');
				document.location.href = '../detailpenjualanwaduksempor.php';
			</script>
		";
	}else{
		echo "

			<script>
				alert('gagal dihapus');
				document.location.href = '../detailpenjualanwaduksempor.php';
			</script>
		";
	}
 ?>