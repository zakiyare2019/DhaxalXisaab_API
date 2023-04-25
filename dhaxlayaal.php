<?php
include 'codes.php';
 $gl=new inheritance_class();

$gl->operationReturn('select deceased_id ID,concat(name," ",date_of_death) as marxuum from deceased');


?>