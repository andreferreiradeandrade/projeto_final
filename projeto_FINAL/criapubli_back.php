<?php
session_start();

include_once('conexao.php');

if(! isset($_SESSION['id_usuario'])){
    die('Você precisa estar logado para publicar');
}

if(isset($_POST['conteudo'])){
    $conteudo = $_POST['conteudo'];
    $id_usuario = $_SESSION['id_usuario'];
    $sql = "INSERT INTO publicacoes(id_usuario, conteudo) VALUES (?, ?)";
    $stmt = conn->prepare($sql);
    $stmt->bind_param("is", $id_usuario, $conteudo);

    if ($stmt -> execute()){
        echo"Publicação inserida com sucesso";
    }else{
        echo"Erro ao publicar";
    }
}

?>
