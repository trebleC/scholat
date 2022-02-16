<?php
$severname = "localhost:3306";
$usrname = "root";
$password = "";
$dbname = "software_eng";

//thrprmaguzzwbehh
//创建连接s

$conn = new mysqli($severname, $usrname, $password, $dbname);


//检测连接
if($conn->connect_error)
die("连接失败：".$conn->connect_error);
mysqli_query($conn,"SET NAMES utf8");

?>