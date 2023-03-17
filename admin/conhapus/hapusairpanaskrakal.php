<?php 
	include 'connectionairpanaskrakal.php';

	$id = $_GET['id'];

	if (hapus($id)) {
		echo "

			<script>
				alert('data berhasil dihapus');
				document.location.href = '../detailpenjualanairpanaskrakal.php';
			</script>
		";
	}else{
		echo "

			<script>
				alert('gagal dihapus');
				document.location.href = '../detailpenjualanairpanaskrakal.php';
			</script>
		";
	}
 ?>