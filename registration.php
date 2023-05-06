<?php
include "codes.php";

$username= $_POST['user_name'];
$password = $_POST['password'];
$email= $_POST['email'];


$sql= "insert into users values (null,'$username','$email','$password')";
$gl=new inheritance_class();

$gl->operation($sql);
echo 'Successfully inserted';
//print ($gl);
?>
