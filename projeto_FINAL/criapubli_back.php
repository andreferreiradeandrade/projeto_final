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