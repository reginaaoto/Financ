<pre>
<?php
require_once 'dbcon.php';
print_r($_POST);

$data = DateTime::createFromFormat('d/m/Y', $_POST['data']); 

$valor = ($_POST['tipo']== "D")? $_POST['valor']*-1 : $_POST['valor'];

$sql = "INSERT INTO conta_corrente(data, descricao, categoria, tipo, valor)
    VALUES(
        '".$data->format('Y-m-d')."',
        '".$_POST['Descricao']."',
        '".$_POST['categoria']."',
        '".$_POST['tipo']."',  
        '".$valor."'
        )";
 
//secho $sql;

 $result = $dbcon->exec($sql);

 echo json_encode($result);

