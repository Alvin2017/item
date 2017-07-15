<?php
header("content-type:application/json;charset=utf-8");
$message = $_REQUEST['message'];
$conn=mysqli_connect('127.0.0.1','root','','liuyan');
$sql="SET NAMES UTF8";
mysqli_query($conn,$sql);
$sql = "INSERT INTO ban VALUES(null,'$message',now())";
$result = mysqli_query($conn,$sql);
$sql="select * from ban order by id desc limit 1";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo json_encode($row);