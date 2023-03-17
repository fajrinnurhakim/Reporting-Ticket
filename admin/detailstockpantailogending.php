<?php include 'functions.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=gagal");
}

 $jual = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta, SUM(tiket_atv) as tat, SUM(tiket_perahu) as tp, SUM(tiket_kuda) as tk, SUM(tiket_r2) as tr2, SUM(tiket_r4) as tr4, SUM(tiket_r6) as tr6, SUM(tiket_retribusi_kios) as trk, SUM(tiket_retribusi_los) trl, SUM(tiket_retribusi_lesehan) trl2 FROM laporan_logending")[0]; 

 $stok = query("SELECT SUM(tiket_dewasa) as td, SUM(tiket_anak) as ta, SUM(tiket_atv) as tat, SUM(tiket_perahu) as tp, SUM(tiket_kuda) as tk, SUM(tiket_r2) as tr2, SUM(tiket_r4) as tr4, SUM(tiket_r6) as tr6, SUM(tiket_retribusi_kios) as trk, SUM(tiket_retribusi_los) trl, SUM(tiket_retribusi_lesehan) trl2 FROM drop_logending")[0]; 


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Laporan Stok Tiket Pantai Logending</title>
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
                <h1 class="judulheader" href="#">Detail Laporan Stok Tiket Pantai Logending</h1>
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
                    <th colspan="17">DAFTAR LAPORAN STOK TIKET PANTAI LOGENDING</td>
                </tr>
                <tr>
                    <td align="center"> Tiket Dewasa</td>
                    <td align="center"> Tiket Anak</td>
                    <td align="center"> Tiket ATV</td>
                    <td align="center"> Tiket Perahu</td>
                    <td align="center"> Tiket Kuda</td>
                    <td align="center"> Tiket Roda 2</td>
                    <td align="center"> Tiket Roda 4</td>
                    <td align="center"> Tiket Roda 6</td>
                    <td align="center"> Tiket Sampah Kios</td>
                    <td align="center"> Tiket Sampah Los</td>
                    <td align="center"> Tiket Sampah Lesehan</td>
                    
                </tr>
                <tr>
                        <td align="center">
                            <?= $stok1 = $stok["td"] - $jual["td"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok2 = $stok["ta"] - $jual["ta"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok3 = $stok["tat"] - $jual["tat"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok4 = $stok["tp"] - $jual["tp"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok5 = $stok["tk"] - $jual["tk"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok6 = $stok["tr2"] - $jual["tr2"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok7 = $stok["tr4"] - $jual["tr4"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok8 = $stok["tr6"] - $jual["tr6"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok9 = $stok["trk"] - $jual["trk"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok10 = $stok["trl"] - $jual["trl"]; ?>
                        </td>
                        <td align="center">
                            <?= $stok11 = $stok["trl2"] - $jual["trl2"]; ?>
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