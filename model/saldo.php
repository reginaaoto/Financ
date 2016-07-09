<?php
require_once 'dbcon.php';
$user = json_decode($_COOKIE["sess-sis"]);

$sql = "SELECT SUM(valor) as saldo FROM conta_corrente WHERE usuario = ".$user->id."";
 
$result = $dbcon->query($sql)->fetch(PDO::FETCH_ASSOC);

 echo json_encode($result);