<?php include 'functions.php';
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=gagal");
}
function cari($keyword, $keyword2) {
    $query = "SELECT * FROM drop_waduk_sempor
                WHERE
              tanggal BETWEEN '$keyword' AND '$keyword2'
            ";
    return query($query);
} 


 $ambil = mysqli_query($conn, "SELECT * FROM drop_waduk_sempor ORDER BY tanggal DESC"); 


// jika tombol cari di tekan
if (isset($_POST["cari"])) {
    $ambil = cari($_POST["keyword"], $_POST["keyword2"]);
}   

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Laporan Drop Waduk Sempor</title>
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
                <h1 class="judulheader" href="#">Detail Laporan Drop Waduk Sempor</h1>
            </li>
            <li><a href="../logout.php"><img class="iconout" src="../image/logouticon.svg"></a></li>
            <li>
                <h2 href="#">Admin</h2>
            </li>
        </ul>
    </nav>

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
                    <th colspan="17">DAFTAR LAPORAN DROP TIKET WADUK SEMPOR</td>
                </tr>
                <tr>
                    <td align="center">No</td>
                    <td align="center">Tanggal</td>
                    <td align="center">Nama Pelapor</td>
                    <td align="center">Tiket Dewasa</td>
                    <td align="center">Tiket Anak</td>
                    <td align="center">Tiket Perahu</td>
                    <td align="center">Tiket Roda 2</td>
                    <td align="center">Tiket Roda 4</td>
                    <td align="center">Tiket Roda 6</td>
                    <td align="center">Tiket Sampah Kios</td>
                    <td align="center">Tiket Sampah Los</td>
                    <td align="center">Tiket Sampah Lesehan</td>
                    <td align="center">Aksi</td>
                </tr>
                <?php $i = 1; ?>
               
                <?php foreach ($ambil as $row):?>
                <tr>
                    <td align="center"><?= $i; ?></td>
                        <td><?= $row["tanggal"]; ?></td>
                        <td><?= $row["nama_pelapor"]; ?></td>
                        <td align="center">
                            
                            <?= $row["tiket_dewasa"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_anak"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_perahu"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_r2"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_r4"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_r6"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_retribusi_kios"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_retribusi_los"]; ?> 
                        </td>
                        <td align="center">
                            
                            <?= $row["tiket_retribusi_lesehan"]; ?> 
                        </td>
                        <td align="center">
                            <a href="dropconhapus/hapuswaduksempor.php?id=<?php echo $row["id"] ?>" onclick="return confirm('anda yangkin menghapus data ini?');">Hapus</a>
                        </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                
                <!-- <tr>
                    <td colspan="16" align="center"><input type="submit" name="Tambah" value="Tambah"></td>
                </tr> -->
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