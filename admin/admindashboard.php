<?php include 'functions.php';
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=gagal");
}

$jualkrakal = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_krakal")[0];
$jualjatijajar = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_jatijajar")[0];
$jualpetruk = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_petruk")[0];
$jualkarangbolong = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_karangbolong")[0];
$juallogending = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_logending")[0];
$jualpetanahan = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_petanahan")[0];
$jualsuwuk = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_suwuk")[0];
$jualsempor = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_waduk_sempor")[0];
$jualwadaslintang = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta FROM laporan_wadaslintang")[0];

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="shortcut icon" href="../image/logo.png">

</head>

<body>
<nav class="navbar">
        <span class="open-slide">
            <a href="#" onclick="openSlideMenu()">
                <img class="hamburgermenu" src="../image/hamburgermenu1.svg">
            </a>
        </span>
        <ul class="navbar-nav">
            <li>
                <h1 class="judulheader" href="#">Dashboard Admin</h1>
            </li>
            <li><a href="../logout.php"><img class="iconout" src="../image/logouticon.svg"></a></li>
            <li>
                <h2 href="#">Admin</h2>
            </li>
        </ul>
    </nav>

    <?php include 'side.php'; ?>
	<div class="container"></div>
	<div id="main">
		<div class="dashboard">
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket PAP Krakal</p>
				</div>
				<div>
					<?= $jualkrakal = $jualkrakal["td"] + $jualkrakal["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Goa Jatijajar</p>
				</div>
				<div>
					<?= $jualjatijajar = $jualjatijajar["td"] + $jualjatijajar["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Goa Petruk</p>
				</div>
				<div>
					<?= $jualpetruk = $jualpetruk["td"] + $jualpetruk["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Pantai Karangbolong</p>
				</div>
				<div>
					<?= $jualkarangbolong = $jualkarangbolong["td"] + $jualkarangbolong["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Pantai Logending</p>
				</div>
				<div>
					<?= $juallogending = $juallogending["td"] + $juallogending["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Pantai Petanahan</p>
				</div>
				<div>
					<?= $jualpetanahan = $jualpetanahan["td"] + $jualpetanahan["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Pantai Suwuk</p>
				</div>
				<div>
					<?= $jualsuwuk = $jualsuwuk["td"] + $jualsuwuk["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Waduk Sempor</p>
				</div>
				<div>
					<?= $jualsempor = $jualsempor["td"] + $jualsempor["ta"]; ?>/300 pengunjung
				</div>
			</div>
			<div class="card color5 ">
				<div>
					<p>Penjualan Tiket Waduk Wadaslintang</p>
				</div>
				<div>
					<?= $jualwadaslintang = $jualwadaslintang["td"] + $jualwadaslintang["ta"]; ?>/300 pengunjung
				</div>
			</div>
		</div>
	</div>
	&nbsp;
	&nbsp;



	<footer class="footer-distributed">
		<div class="footer-left">
			<p class="footer-company-name">© 2022 Disparbud Kebumen</p>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<img class="logodinas" src="../image/logodinas.png">
			</p>
		</div>
	</footer>

	<script>
		function openSlideMenu() {
			document.getElementById('side-menu').style.width = '250px';
			document.getElementById('main').style.marginLeft = '250px';
		}

		function closeSlideMenu() {
			document.getElementById('side-menu').style.width = '0';
			document.getElementById('main').style.marginLeft = '0';
		}

		function speedChart() {
			document.getElementById("speedChart");
		}

		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
					dropdownContent.style.display = "none";
				} else {
					dropdownContent.style.display = "block";
				}
			});
		}
	</script>


</body>

</html>