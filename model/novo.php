<pre>
<?php
require_once 'dbcon.php';
print_r($_POST);

$data = DateTime::createFromFormat('d/m/Y', $_POST['data']); 

$valor = ($_POST['tipo']== "D")? $_POST['valor']*-1 : $_POST['valor'];

$sql = "INSERT INTO conta_corrente(data, descricao, categoria, tipo,usuario, valor)
    VALUES(
        '".$data->format('Y-m-d')."',
        '".$_POST['descricao']."',
        '".$_POST['categoria']."',
        '".$_POST['tipo']."',    
        '".$_POST['usuario']."',    
         '".$valor."'    
        )";
 
//echo $sql;

 $result = $dbcon->exec($sql);

 echo json_encode($result);

