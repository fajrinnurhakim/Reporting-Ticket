<?php include 'functions.php';
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=gagal");
}
function cari($keyword, $keyword2)
{
    $query = "SELECT * FROM laporan_krakal
                    WHERE
                  tanggal BETWEEN '$keyword' AND '$keyword2'
                ";
    return query($query);
}
function cari2($keyword, $keyword2)
{
    $query = "SELECT SUM(tiket_dewasa) as tiket_dewasa, SUM(tiket_anak) as tiket_anak, SUM(tiket_mandi) as tiket_mandi, SUM(tiket_r2) as tiket_r2, SUM(tiket_r4) as tiket_r4, SUM(tiket_r6) as tiket_r6, SUM(tiket_retribusi_kios) as tiket_retribusi_kios, SUM(tiket_retribusi_los) as tiket_retribusi_los, SUM(tiket_retribusi_lesehan) as tiket_retribusi_lesehan  FROM laporan_krakal
                    WHERE
                  tanggal BETWEEN '$keyword' AND '$keyword2'
                ";
    return query($query)[0];
}

$ambil = mysqli_query($conn, "SELECT * FROM laporan_krakal ORDER BY tanggal DESC");

$total = query("SELECT SUM(tiket_dewasa) as tiket_dewasa, SUM(tiket_anak) as tiket_anak, SUM(tiket_mandi) as tiket_mandi, SUM(tiket_r2) as tiket_r2, SUM(tiket_r4) as tiket_r4, SUM(tiket_r6) as tiket_r6, SUM(tiket_retribusi_kios) as tiket_retribusi_kios, SUM(tiket_retribusi_los) as tiket_retribusi_los, SUM(tiket_retribusi_lesehan) as tiket_retribusi_lesehan  FROM laporan_krakal")[0];

// jika tombol cari di tekan
if (isset($_POST["cari"])) {
    $ambil = cari($_POST["keyword"], $_POST["keyword2"]);
    $total = cari2($_POST["keyword"], $_POST["keyword2"]);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Laporan Penjualan Tiket PAP Krakal</title>
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
                <h1 class="judulheader" href="#">Detail Laporan Penjualan Tiket PAP Krakal</h1>
            </li>
            <li><a href="../logout.php"><img class="iconout" src="../image/logouticon.svg"></a></li>
            <li>
                <h2 href="#">User</h2>
            </li>
        </ul>
    </nav>

    <!-- Side Menu -->
    <?php include 'side.php'; ?>

    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="subject">Pencarian</label>
                </div>
                <div class="col-20">
                    <input type="date" id="keyword" name="keyword" formControlName="a_0_loanNumber">
                </div>
                <div class="col-20">
                    <input type="date" id="keyword2" name="keyword2" formControlName="a_0_loanNumber">
                </div>
                <div class="col-20">
                    <button type="submit" class="btn btn-primary" name="cari" style="margin-top: 10px;">Cari</button>
                </div>
            </div>

        </form>
    </div>
    <div id="main">
        <form action="lapor.php" method="POST">
            <table border="1" width="70%" align="center">
                <tr>
                    <th colspan="17">DAFTAR LAPORAN TIKET PAP KRAKAL YANG TERJUAL</td>
                </tr>
                <tr>
                    <td align="center">No</td>
                    <td align="center">Tanggal</td>
                    <td align="center">Nama Pelapor</td>
                    <td align="center">Tiket Dewasa</td>
                    <td align="center">Tiket Anak</td>
                    <td align="center">Tiket Mandi</td>
                    <td align="center">Tiket Roda 2</td>
                    <td align="center">Tiket Roda 4</td>
                    <td align="center">Tiket Roda 6</td>
                    <td align="center">Tiket Sampah Kios</td>
                    <td align="center">Tiket Sampah Los</td>
                    <td align="center">Tiket Sampah Lesehan</td>
                    <td align="center">Pendapatan</td>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($ambil as $row) : ?>
                    <tr>
                        <td align="center"><?= $i; ?></td>
                        <td><?= $row["tanggal"]; ?></td>
                        <td><?= $row["nama_pelapor"]; ?></td>
                        <td align="center">
                            <?php $total_1 = $row["tiket_dewasa"] * 3000; ?>
                            <?= $row["tiket_dewasa"]; ?> = Rp<?= number_format($total_1, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_2 = $row["tiket_anak"] * 2000; ?>
                            <?= $row["tiket_anak"]; ?> = Rp<?= number_format($total_2, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_3 = $row["tiket_mandi"] * 12000; ?>
                            <?= $row["tiket_mandi"]; ?> = Rp<?= number_format($total_3, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_4 = $row["tiket_r2"] * 2000; ?>
                            <?= $row["tiket_r2"]; ?> = Rp<?= number_format($total_4, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_5 = $row["tiket_r4"] * 5000; ?>
                            <?= $row["tiket_r4"]; ?> = Rp<?= number_format($total_5, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_6 = $row["tiket_r6"] * 10000; ?>
                            <?= $row["tiket_r6"]; ?> = Rp<?= number_format($total_6, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_7 = $row["tiket_retribusi_kios"] * 500; ?>
                            <?= $row["tiket_retribusi_kios"]; ?> = Rp<?= number_format($total_7, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_8 = $row["tiket_retribusi_los"] * 400; ?>
                            <?= $row["tiket_retribusi_los"]; ?> = Rp<?= number_format($total_8, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_9 = $row["tiket_retribusi_lesehan"] * 200; ?>
                            <?= $row["tiket_retribusi_lesehan"]; ?> = Rp<?= number_format($total_9, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?php $total_10 = $total_1 + $total_2 + $total_3 + $total_4 + $total_5 + $total_6 + $total_7 + $total_8 + $total_9; ?>
                            Rp<?= number_format($total_10, 0, ',', '.'); ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                        <?php error_reporting(0); ?>
                        <?php $total_1 = $total["tiket_dewasa"] * 3000; ?>
                        <?php $total_2 = $total["tiket_anak"] * 2000; ?>
                        <?php $total_3 = $total["tiket_mandi"] * 12000; ?>
                        <?php $total_4 = $total["tiket_r2"] * 2000; ?>
                        <?php $total_5 = $total["tiket_r4"] * 5000; ?>
                        <?php $total_6 = $total["tiket_r6"] * 10000; ?>
                        <?php $total_7 = $total["tiket_retribusi_kios"] * 500; ?>
                        <?php $total_8 = $total["tiket_retribusi_los"] * 400; ?>
                        <?php $total_9 = $total["tiket_retribusi_lesehan"] * 200; ?>
                        <?php $total_10 = $total_1 + $total_2 + $total_3 + $total_4 + $total_5 + $total_6 + $total_7 + $total_8 + $total_9; ?>
                        <td colspan="3">
                            Total  Pendapatan
                        </td>
                        <td align="center">
                        <?= $total["tiket_dewasa"]; ?> = Rp<?= number_format($total_1, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_anak"]; ?> = Rp<?= number_format($total_2, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_mandi"]; ?> = Rp<?= number_format($total_3, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_r2"]; ?> = Rp<?= number_format($total_4, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_r4"]; ?> = Rp<?= number_format($total_5, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_r6"]; ?> = Rp<?= number_format($total_6, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_retribusi_kios"]; ?> = Rp<?= number_format($total_7, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_retribusi_los"]; ?> = Rp<?= number_format($total_8, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            <?= $total["tiket_retribusi_lesehan"]; ?> = Rp<?= number_format($total_9, 0, ',', '.'); ?>
                        </td>
                        <td align="center">
                            Rp<?= number_format($total_10, 0, ',', '.'); ?>
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