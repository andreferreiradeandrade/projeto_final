<?php
session_start();

if (empty($_POST['usu']) || empty($_POST['senha'])) {
    echo "<script>location.href='index.php';</script>";
    exit;
}

include("conexao.php");
$usu = $con->real_escape_string($_POST['usu']);
$senha = $con->real_escape_string($_POST['senha']);

$sql = "SELECT * FROM usuario WHERE nome = '$usu' AND senha = '$senha'";
$res = $con->query($sql);

if ($res->num_rows > 0) {
    $_SESSION["usuario"] = $usu;
    echo "<script>location.href='listando.php';</script>";
} else {
    echo "<script>alert('Usuário ou senha inválido');</script>";
    echo "<script>location.href='index.php';</script>";
}
?>
