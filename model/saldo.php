<?php
require_once 'dbcon.php';

$sql = "SELECT SUM(valor) as saldo FROM conta_corrente";
 
$result = $dbcon->query($sql)->fetch(PDO::FETCH_ASSOC);

 echo json_encode($result);