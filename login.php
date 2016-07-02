<pre>
<?php

$dbcon = new PDO("sqlite:model/banco.sqlite");

$sql = "SELECT * FROM usuario 
        WHERE email = '".$_POST['lg_username']."'
        AND senha ='".$_POST['lg_password']."'";

$result = $dbcon->query($sql)->fetchAll();
var_dump($result);
//echo json_encode($result);
//echo "<br>".$sql;
//echo "<br>".$result;
if (count($result)>0)
{
     $user['id'] = $result[0]['id'];
     $user['nome'] = $result[0]['nome'];
     
     setcookie('sess-sis',  json_encode($user));
    echo "<br>Esta logado";
}
else
{   
    $retorno['erro'] = "Usuario ou senha nao encontrado!.";
    echo json_encode($retorno);
}

