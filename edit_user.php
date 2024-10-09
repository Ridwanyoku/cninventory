<?php

require 'config/db_connect.php';

$iduser = $_POST['iduser'];
$username = $_POST['username'];
$password = $_POST['password'];
$role= $_POST['role'];

$sql_edit = "UPDATE login SET username='$username', password='$password', role='$role' WHERE iduser='$iduser'";
$edit_user = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: login_user.php');

?>