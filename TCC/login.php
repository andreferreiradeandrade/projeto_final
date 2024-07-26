<?php
session_start();

if (empty($_POST['usu']) || empty($_POST['senha'])) {
    echo "<script>location.href='index.php';</script>";
    exit;
}

include("conexao.php");

#real_scape_string serve para evitar SQL Injection
$usu = $con->real_escape_string($_POST['usu']);
$senha = $con->real_escape_string($_POST['senha']);

$sql = "SELECT * FROM usuario WHERE nome = '$usu' AND senha = '$senha'";
$res = $con->query($sql);


#Verifica se $res->num_rows > 0, ou seja, se foram encontrados registros na tabela usuario que correspondem ao nome de usuário e senha fornecidos.
#Se a consulta retornar pelo menos uma linha, significa que o login foi bem-sucedido.
#Define $_SESSION["usuario"] como $usu, armazenando o nome de usuário na variável de sessão.
if ($res->num_rows > 0) {
    $_SESSION["usuario"] = $usu;
    echo "<script>location.href='listando.php';</script>";
} else {
    echo "<script>alert('Usuário ou senha inválido');</script>";
    echo "<script>location.href='index.php';</script>";
}
?>
