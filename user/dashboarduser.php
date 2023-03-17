<?php include 'functions.php';
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard User</title>
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
				<h1 class="judulheader" href="#">Dashboard</h1>
			</li>
			<li><a href="../logout.php"><img class="iconout" src="../image/logouticon.svg"></a></li>
			<li>
				<h2 href="#">User</h2>
			</li>
		</ul>
	</nav>

	<!-- Side Menu -->
	<?php include 'side.php'; ?>
	<div class="container"></div>
	<div id="main">
		<h3>Selamat Datang di Halaman Dashboard Ticket Reporting Dinas Pariwisata dan Kebudayaan Kabupaten Kebumen</h3>
	</div>

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
		var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
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