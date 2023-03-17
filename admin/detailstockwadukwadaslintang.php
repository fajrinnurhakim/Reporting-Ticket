<?php include 'functions.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=gagal");
}
 $jual = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta, SUM(tiket_r2) as tr2, SUM(tiket_r4) as tr4, SUM(tiket_r6) as tr6 FROM laporan_wadaslintang")[0]; 

 $stok = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta, SUM(tiket_r2) as tr2, SUM(tiket_r4) as tr4, SUM(tiket_r6) as tr6 FROM drop_wadaslintang")[0]; 


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Laporan Stok Tiket Waduk wadaslintang</title>
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
                <h1 class="judulheader" href="#">Detail Laporan Stok Tiket Waduk wadaslintang</h1>
            </li>
            <li><a href="../logout.php"><img class="iconout" src="../image/logouticon.svg"></a></li>
            <li>
                <h2 href="#">Admin</h2>
            </li>
        </ul>
    </nav>

    <?php include 'side.php'; ?>

    <div class="container">

    </div>
    <div id="main">
        <form action="lapor.php" method="POST">
            <table border="1" width="70%" align="center">
                <tr>
                    <th colspan="17">DAFTAR LAPORAN STOK TIKET WADUK WADASLINTANG</td>
                </tr>
                <tr>
                    <td align="center"> Tiket Dewasa</td>
                    <td align="center"> Tiket Anak</td>
                    <td align="center"> Tiket Roda 2</td>
                    <td align="center"> Tiket Roda 4</td>
                    <td align="center"> Tiket Roda 6</td>
                </tr>
                <tr>
                        <td align="center">
                            <?= $stok1 = $stok["td"] - $jual["td"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok2 = $stok["ta"] - $jual["ta"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok3 = $stok["tr2"] - $jual["tr2"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok4 = $stok["tr4"] - $jual["tr4"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok5 = $stok["tr6"] - $jual["tr6"]; ?>
                        </td>
                </tr>
            </table>
        </form>
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