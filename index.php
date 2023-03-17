<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN TICKET REPORTING</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="image/logo.png">
</head>
<body>
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>TICKET REPORTING</h1>
                <h4>Dinas Pariwisata dan Kebudayaan Kabupaten Kebumen</h4>
                <img class="logodinas1" src="image/logodinas.png"></a>
            </div>
        </div>
        <div class="right">
            <h5>Login Ticket Reporting</h5>
            <div class="inputs">
                <form action="cek_login.php" method="post">
                    <input class="input" type="username" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                    <input class="input" type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    <button class="login" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>