<?php
include "codes.php";

$deceased_id = $_POST['deceased_id'];
$wiilal = $_POST['wiilal'];
$gabdho = $_POST['gabdho'];
$aabo = $_POST['aabo'];
$hooyo = $_POST['hooyo'];
$aboowe = $_POST['aboowe'];
$abaayo = $_POST['abaayo'];
$wiilka_wiilkiisa = $_POST['wiilka_wiilkiisa'];
$adeer = $_POST['adeer'];
$marwo = $_POST['marwo'];
$xaasle = $_POST['xaasle'];


$sql= "insert into heirs values (null,'$deceased_id','$wiilal','$gabdho','$aabo','$hooyo','$aboowe','$abaayo','$wiilka_wiilkiisa','$adeer','$marwo','$xaasle')";
$gl=new inheritance_class();

$gl->operation($sql);
echo 'Successfully inserted';
//print ($gl);
?>
