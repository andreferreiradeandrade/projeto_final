<?php
  
  #Se o botão enviar for pressionado
  if(isset($_POST['submit'])){
    include_once('conexao.php');

    #Conectando colunas do banco com os inputs no formulário
    $usu =$_POST['usu'];
    $email =$_POST['email'];
    $senha =$_POST['senha'];
    $id =$_POST['id'];

    #Faz a inserção na base de dados
    $result = mysqli_query($con, "INSERT INTO usuario(nome, email, senha, id) values ('$usu', '$email', '$senha', '$id')");

    echo('cadastrado com sucesso');
}

  ?>