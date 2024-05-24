<?php
  
  if(isset($_POST['submit'])){
    include_once('conexao.php');

    $usu =$_POST['usu'];
    $tel =$_POST['tel'];
    $email =$_POST['email'];
    $senha =$_POST['senha'];

    $result = mysqli_query($con, "INSERT INTO usuario(usu, tel, email, senha) values ('$usu', '$tel', '$email', '$senha')");

    echo('cadastrado com sucesso');
}

  ?>