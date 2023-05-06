<?php
include 'codes.php';
 $gl=new inheritance_class();
$deceased_id = $_POST['deceased_id'];
$gl->operationReturn('select deceased_id,hanti,deen,dardaaran from deceased where deceased_id=$deceased_id');


?>