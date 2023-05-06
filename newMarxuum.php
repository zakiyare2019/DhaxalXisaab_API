<?php
include "codes.php";

$name = $_POST['name'];
$gender= $_POST['gender'];
$date_of_death = $_POST['date_of_death'];
$hanti = $_POST['hanti'];
$deen = $_POST['deen'];
$dardaaran = $_POST['dardaaran'];


$sql= "insert into deceased values (null,'$name','$gender','$date_of_death','$hanti','$deen','$dardaaran')";
$gl=new inheritance_class();

$gl->operation($sql);
echo 'Successfully inserted';
//print ($gl);
?>
