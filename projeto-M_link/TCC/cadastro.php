<?php
  
  if(isset($_POST['submit'])){
    include_once('conexao.php');

    $usu =$_POST['usu'];
    $email =$_POST['email'];
    $senha =$_POST['senha'];

    $result = mysqli_query($con, "INSERT INTO usuario(nome, email, senha) values ('$usu', '$email', '$senha')");

    echo('cadastrado com sucesso');
}

  ?>