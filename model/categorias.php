<?php
require_once 'dbcon.php';

$sql = "SELECT * FROM categoria ORDER BY nome";

$result = $dbcon->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
