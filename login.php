<?php

$dbcon = new PDO("sqlite:model/banco.sqlite");


$salt ='abracadabra';
$senhaUsu = $_POST['lg_password'];
//$senhaUsu = '123';
$senha = sha1($senhaUsu.$salt);

$sql = "SELECT * FROM usuario
        WHERE email = '".$_POST['lg_username']."' AND senha = '".$senha."'";


$result = $dbcon->query($sql)->fetchAll();

if(count($result) > 0)
{
    $user['id'] = $result[0]['id'];
    $user['nome'] = $result[0]['nome'];
    
    if($_POST['lg_remember']=='1')
    {
        $semana = 60 * 60 * 24 * 7;
        $expira = time() + $semana;
    } else{
        $expira = 0;
    }
    
    setcookie('sess-sis', json_encode($user), $expira);
    
    header('Location: index.php');
    
} else {
    $retorno['erro'] = "Usuario ou senha não encontrado!";
    
    echo json_encode($retorno);
}

