<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=gagal");
}
include 'functions.php';



function regis($data)
{
    global $conn;

    $nama_pelapor = htmlspecialchars($data["nama_pelapor"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $tiket_dewasa = htmlspecialchars($data["tiket_dewasa"]);
    $tiket_anak = htmlspecialchars($data["tiket_anak"]);
    $tiket_kuda = htmlspecialchars($data["tiket_kuda"]);
    $tiket_r2 = htmlspecialchars($data["tiket_r2"]);
    $tiket_r4 = htmlspecialchars($data["tiket_r4"]);
    $tiket_r6 = htmlspecialchars($data["tiket_r6"]);
    $tiket_retribusi_kios = htmlspecialchars($data["tiket_retribusi_kios"]);
    $tiket_retribusi_los = htmlspecialchars($data["tiket_retribusi_los"]);
    $tiket_retribusi_lesehan = htmlspecialchars($data["tiket_retribusi_lesehan"]);


    mysqli_query($conn, "INSERT INTO drop_suwuk VALUES(
        NULl, 
        '$nama_pelapor',
        '$tanggal',
        '$tiket_dewasa',
        '$tiket_anak',
        '$tiket_kuda',
        '$tiket_r2',
        '$tiket_r4',
        '$tiket_r6',
        '$tiket_retribusi_kios',
        '$tiket_retribusi_los',
        '$tiket_retribusi_lesehan'
    )");
    return mysqli_affected_rows($conn);
}

if (isset($_POST["add"])) {

    if (regis($_POST) > 0) {

        echo "<script>
            alert('Berhasil!');
            window.location.href='detaildroppantaisuwuk.php'
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drop Stock Pantai Suwuk</title>
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
                <h1 class="judulheader" href="#">Drop Stock Tiket Pantai Suwuk</h1>
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
                    <label for="fname">Nama Pelapor</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="nama_pelapor" placeholder="Nama Pelapor..">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="subject">Tanggal</label>
                </div>
                <div class="col-75">
                    <input type="date" id="version_date" name="tanggal" formControlName="a_0_loanNumber">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Dropping Retribusi Tiket Dewasa</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_dewasa" placeholder="Masukkan Jumlah Tiket Dewasa">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Dropping Retribusi Tiket Anak</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_anak" placeholder="Masukkan Jumlah Tiket Anak">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Dropping Retribusi Tiket Kuda</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_kuda" placeholder="Masukkan Jumlah Tiket Perahu">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Dropping Retribusi Tiket Roda 2</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_r2" placeholder="Masukkan Jumlah Tiket Roda 2">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Dropping Retribusi Tiket Roda 4</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_r4" placeholder="Masukkan Jumlah Tiket Roda 4">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Dropping Retribusi Tiket Roda 6</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_r6" placeholder="Masukkan Jumlah Tiket Roda 6">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Retribusi Tiket Sampah Kios</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_retribusi_kios" placeholder="Masukkan Jumlah Tiket Retribusi Sampah Kios">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Retribusi Tiket Sampah Los</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_retribusi_los" placeholder="Masukkan Jumlah Tiket Retribusi Sampah Los">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Jumlah Retribusi Tiket Sampah Lesehan</label>
                </div>
                <div class="col-75">
                    <input type="number" id="fname" name="tiket_retribusi_lesehan" placeholder="Masukkan Jumlah Tiket Retribusi Sampah Lesehan">
                </div>
            </div>
            &nbsp;
            <div class="row">
                <center>
                    <button type="submit" name="add" style="width:25%;cursor: pointer;">Kirim</button>
                </center>
            </div>

        </form>
    </div>

    <div>
        <footer class="footer-distributed1">
            <div class="footer-left">
                <p class="footer-company-name">© 2022 Disparbud Kebumen</p>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <img class="logodinas" src="../image/logodinas.png">
                </p>
            </div>
        </footer>
    </div>

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