<?php
include "codes.php";

$name= $_POST['name'];
$totalAsset = $_POST['totalAsset'];
$loan= $_POST['loan'];
$will = $_POST['will'];
$gender= $_POST['gender'];

$sql= "insert into marxuum values (null,'$name','$totalAsset','$loan','$will','$gender')";
$gl=new inheritance_class();

$gl->operation($sql);
echo 'Successfully inserted';
//print ($gl);
?>
