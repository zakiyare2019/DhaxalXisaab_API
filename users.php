<?php
include 'codes.php';
$username= $_POST['username'];
$password= $_POST['password'];
 $gl=new inheritance_class();

$sql= "select user_name ,password from users where user_name='$username' and password='$password'";

print (json_decode($sql));

//$gl->operationReturn(sql);


?>