<?php

require 'config/db_connect.php';

$namapengguna = $_POST['namapengguna'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "INSERT INTO login (username, password, role) values('$namapengguna', '$password', '$role')";
$addtotable = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: login_user.php');

?>