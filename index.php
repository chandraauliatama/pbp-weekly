<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>PERTEMUAN 3 -- SISTEM PAKAR</h1>
        </div>
 
        <div id="sidebar">
            <h3>NAVIGASI</h3>
            <ul id="navmenu">
                <li><a href="index.php">Insert</a></li>
                <li><a href="?module=view">View</a></li>
                <li><a href="?module=search">Search</a></li>
            </ul>

            <hr style="margin: 40px 0px 20px 0px;">

            <?php if($_SESSION['username']) : ?>

            <ul id="navmenu">
                <li><p style="margin: 0 10px">Selamat Datang,</p></li>
                <li><p style="margin: 0 10px;"><?= $_SESSION['username'] ?></p></li>
                <li><a href="koneksi.php?module=logout">Logout</a></li>
            </ul>

            <?php else : ?>

            <form action="koneksi.php?module=login" method="post" class="login-form">
                <label for="username">USERNAME: </label>
                <input type="text" name="username" required>

                <label for="password">PASSWORD: </label>
                <input type="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <?php endif; ?>
        </div>
 
        <div id="page">
            <?php if (isset($_GET['module'])) {
                include "konten/" . $_GET['module'] . ".php";
            } else {
                include "konten/home.php";
            } ?>
        </div>
 
        <div id="clear"></div>
 
        <div id="footer">
            <p>&copy; 2023</p>
        </div>
    </div>
</body>
</html>