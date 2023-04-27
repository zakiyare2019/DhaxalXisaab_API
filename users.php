<?php
include 'codes.php';
$username= $_POST['username'];
$password= $_POST['password'];
 $gl=new inheritance_class();

$sql= "select user_name ,password from users where user_name='$username' and password='$password'";
$gl->operationReturn($sql);
return (json_decode($sql));

//


?>