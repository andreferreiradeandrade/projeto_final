<?php

session_start();

require_once('conexao.php');

if (!isset($_SESSION['nome'])){
    header('Location: login.php');
    exit();
}

$nome = $_SESSION['nome'];

$stmt = $mysqli -> prepare("SELECT nome FROM users WHERE username = ?");
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

if (!$useData){
    echo 'Usuário não encontrado.';
    exit();
}

$stmt->close();
$mysqli->close();

?>