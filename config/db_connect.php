<?php

// local
$conn = mysqli_connect("localhost", "root", "", "stock_app");
if($conn->connect_error) {
    die("kondisi gagal: " . $conn->connect_error);
}

//web 
// $conn = mysqli_connect("localhost", "u408817815_rdw", "Rdwcn132", "u408817815_stock_app");
// if($conn->connect_error) {
//     die("kondisi gagal: " . $conn->connect_error);
// }

?>