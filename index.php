<!DOCTYPE html>
<?php
    session_start();

    if (isset($_SESSION['login'])) {
        header('Location: home.php');
        exit;
    }

    session_destroy();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Management Stok Barang" />
    <meta name="keywords" content="Management Stock, Stock App, Barang" />
    <meta name="author" content="Alan Nuari" />
    <link rel="shortcut icon" href="./images/iconcn.png" type="image/x-icon" />
    <title>Welcome</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body style="background-color: lightgreen">
    <div class="d-flex align-items-center container" style="height: 100vh">
        <div class="ml-4"  style="width: 1900px ">
            <h1 class="mb-5" style="color: black;">Manage Your Stock and Increase Your Work effectively</h1>
            <a href="login.php" class="px-4 text-black py-2 text-decoration-none rounded-pill fw-bold" style="background-color: white">Login here</a>
        </div>
        <div class="mr-4" style="margin-left: 80px;">
            <img style="width: 40%" src="./images/iconcn.png" alt="management stock">
            <img style="width: 35%" src="./images/PPLG.png" alt="management stock">
        </div>
    </div>
</body>
</html>