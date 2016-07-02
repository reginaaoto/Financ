<?php
require_once 'dbcon.php';

$hoje = new DateTime();
$mesAnterior = new DateTime('-1 month');

/*$sql = "SELECT * FROM conta_corrente
        WHERE data between '".$mesAnterior->format('Y-m-d')."' AND '".$hoje->format('Y-m-d')."'  
        ORDER BY data ASC";
 */

$sql = "SELECT cc.id, cc.tipo, cc.data, cc.Descricao, cc.valor, c.nome as categoria
        FROM conta_corrente cc
        LEFT JOIN categoria c ON c.id = cc.categoria
         WHERE cc.data between '".$mesAnterior->format('Y-m-d')."' AND '".$hoje->format('Y-m-d')."'  
        ORDER BY cc.data ASC";
 //echo $sql;
$result = $dbcon->query($sql)->fetchAll(PDO::FETCH_ASSOC);

 echo json_encode($result);

