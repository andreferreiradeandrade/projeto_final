<?php
session_start();
if(isset($_POST['submit'])){
    include_once('conexao.php');

if(isset($_SESSION['id_usuario'])){
    die('Você precisa estar logado para publicar');
}

if(isset($_POST['legenda'])){
    $conteudo = $_POST['legenda'];
    $id_usuario = $_SESSION['id_usuario'];
    $sql = "INSERT INTO publicacoes(publi_id_usuarios, legenda) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("is", $id_usuario, $conteudo);

    if ($stmt -> execute()){
        echo"Publicação inserida com sucesso";
    }else{
        echo"Erro ao publicar";
    }
}
}

?>
