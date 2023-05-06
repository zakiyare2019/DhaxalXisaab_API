<?php
include 'codes.php';
 $gl=new inheritance_class();

$gl->operationReturn("select deceased_id id,concat(name,',',date_of_death) deceased from deceased");


?>