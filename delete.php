<?php
include 'conn.php';
$id =  $_GET['id'];

$sql = "DELETE FROM user where id = '$id'";
$result = mysqli_query($conn, $sql);


$sql2 = "DELETE FROM userdetails where user_id = '$id'";
$result2 = mysqli_query($conn, $sql2);


$sql3 = "DELETE FROM userface where user_id = '$id'";
$result3 = mysqli_query($conn, $sql3);


header('location: index.php');
