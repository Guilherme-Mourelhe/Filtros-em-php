<?php 

$servidor = 'Localhost';
$usuario = 'root';
$senha = '';
$banco = 'Banco_cadastro';


$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if(!$conexao){

    die("<h3> Erro de conexão com o banco." . mysqli_connect_error());
}else {

    print ('Conectado com sucesso ao banco');
}

?>