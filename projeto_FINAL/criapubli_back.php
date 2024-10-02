<?php 

if(isset($_POST['submit'])){
    include_once('conexao.php');

    $legenda= $_POST['legenda'];
    

    $result = mysqli_query($con, "INSERT INTO publicacoes(legenda) values ('$legenda')");

    if($result){
        header("Location: home.php");
        exit();
    }else{
        echo "Erro ao publicar ". mysqli_error($con);
    }
}

?>

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
