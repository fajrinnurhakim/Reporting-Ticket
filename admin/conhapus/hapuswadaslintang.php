<?php 
	include 'connectionwadaslintang.php';

	$id = $_GET['id'];

	if (hapus($id)) {
		echo "

			<script>
				alert('data berhasil dihapus');
				document.location.href = '../detailpenjualanwadukwadaslintang.php';
			</script>
		";
	}else{
		echo "

			<script>
				alert('gagal dihapus');
				document.location.href = '../detailpenjualanwadukwadaslintang.php';
			</script>
		";
	}
 ?>