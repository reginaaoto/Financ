<?php

//phpinfo();

$salt ='abracadabra';
$senha = sha1('123'.$salt);
//$senha = sha1('123');
echo  $senha;

