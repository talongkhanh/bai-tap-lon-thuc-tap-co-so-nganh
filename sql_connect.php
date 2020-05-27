<?php
require('sql_config.php');
//Tao ket noi den databse 
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
//Cho phep luu ma unicode
mysqli_set_charset($conn, "utf8");
if($conn->connect_error) {
    var_dump($conn->connect_error);
    die();
}