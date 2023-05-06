<?php
include "codes.php";
$deceased_id = $_POST['deceased_id'];



$sql= "select heirs.deceased_id,hanti,deen,dardaaran,wiilal,gabdho,aabo,hooyo,aboowe,abaayo,adeer,marwo,xaasle from deceased,heirs where deceased.deceased_id=heirs.deceased_id and heirs.deceased_id=$deceased_id";
$gl=new inheritance_class();

$gl->operationReturn($sql);

//echo (json_encode($gl));
?>