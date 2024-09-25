<?php
session_start();


if (empty($_SESSION['usuario'])) {
    echo "<script>location.href='login.php';</script>"; // Redireciona para a página de login se não estiver logado
    exit;
}

include_once('conexao.php'); 


$usuario = $_SESSION['usuario'];


$sql = "SELECT * FROM usuario WHERE nome = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $_SESSION['usuario']);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Erro na consulta: " . $con->error);
}


$user_data = $result->fetch_assoc();


$stmt->close();
$con->close();


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <title>perfil</title>
  <link href="styleperfil.css" rel="stylesheet" type="text/css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>


<body>


  <div class="cont_menu_lateral">

    <button class="backpage"><img src="img/backpage.png" class="backpageimg"></button>

    
    <div class="cont_menu_lateral_perfil"></div>

    <button class="cont_menu_lateral_bot"><img src="img/profileicon.png" class="cont_menu_lateral_botimg"></button>
    
    <button class="cont_menu_lateral_bot"><img src="img/searchicon.png" class="cont_menu_lateral_botimg"></button>
    
    <button class="cont_menu_lateral_bot"><img src="img/homeicon.png" class="cont_menu_lateral_botimg"></button>
    
    <button class="cont_menu_lateral_bot"><img src="img/posticon.png" class="cont_menu_lateral_botimg"></button>
    
    <button class="cont_menu_lateral_bot"><img src="img/menuicon.png" class="cont_menu_lateral_botimg"></button>
    
  </div>



<div class="cont">
  
  <div class="infos_perfil">

    <div class="foto_perfil"></div>

  </div>

  <div class="infos_txt">

  <?php if (isset($user_data)): ?>
        
        <p class="infos_txt_esp">Nome: <?= htmlspecialchars($user_data['nome']); ?></p>
        <p class="infos_txt_esp">Email: <?= htmlspecialchars($user_data['email']); ?></p> 
        <p class="infos_txt_esp">Telefone: <?= htmlspecialchars($user_data['telefone']); ?></p>
        <p class="infos_txt_esp">Sobre mim: <?= htmlspecialchars($user_data['mais']); ?></p>

        <div class="space_between_edit_button"></div>

        <a href='edit.php?id_usu=<?= htmlspecialchars($user_data['id_usu']) ?>'><img class="edit_button" src='img/editing.png' /></a>

    <?php else:?>
       <p>Usuário não encontrado.</p>
    <?php endif;?>


  </div>

  </div>


  <div class="publicacoes">

    <div class="cont_feed_publi">
      <div class="cont_feed_publi_dados">

      </div>

      <div class="cont_feed_publi_text">
      </div>
    </div>

    
  </div>




</body>

</html>
