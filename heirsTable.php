<?php
include "codes.php";
$ob =new inheritance_class();
$sql = "select h_id,concat(deceased.deceased_id,',',name) deceased_id,wiilal,gabdho,aabo,hooyo,aboowe,abaayo,adeer,marwo,xaasle from heirs ,deceased  where deceased.deceased_id=heirs.deceased_id";
$result = $ob->operationReturn($sql);
?>