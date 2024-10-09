<?php

require 'config/db_connect.php';

$iduser = $_POST['iduser'];

$sql_hapus_user = "DELETE FROM login WHERE iduser='$iduser'";
$user_user = mysqli_query($conn, $sql_hapus_user);

mysqli_close($conn);

header('Location: login_user.php');

?>