<?php
include "codes.php";
$ob =new inheritance_class();
$sql = "SELECT * FROM deceased";
$result = $ob->operationReturn($sql);
?>