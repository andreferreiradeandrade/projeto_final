<!DOCTYPE html>
<html lang="pt-br">


<?php
session_start();


if (empty($_SESSION['usuario'])) {
    echo "<script>location.href='login.php';</script>"; // Redireciona para a página de login se não estiver logado
    exit;
}

include_once('conexao.php'); 


$usuario = $_SESSION['usuario'];


$sql = "SELECT * FROM publicacoes";
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



<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="stylehome.css" rel="stylesheet" type="text/css"/>

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

  
</head>



<body>





  <div class="logo">
    <a href= "cadastro.php"><button class="backpage">

      <img src="img/backpage.png" class= "backpageimg">

    </button>
    </a>
   
    <img src="img/logo.png" class="logo_img">
  </div>





  <main class="cont">

    


    <div class="cont_menu_lateral">
      <div class="cont_menu_lateral_perfil"></div>
      <a href= "perfil12.php"><button class="cont_menu_lateral_bot"><img src="img/profileicon.png" class="cont_menu_lateral_botimg"></button></a>
      <button class="cont_menu_lateral_bot"><img src="img/searchicon.png" class="cont_menu_lateral_botimg"></button>
      <button class="cont_menu_lateral_bot"><img src="img/homeicon.png" class="cont_menu_lateral_botimg"></button>
      <a href= "criapubli.php"><button class="cont_menu_lateral_bot"><img src="img/posticon.png" class="cont_menu_lateral_botimg"></button></a>
      <button class="cont_menu_lateral_bot"><img src="img/menuicon.png" class="cont_menu_lateral_botimg"></button>
    </div>





    <div class="cont_feed">


      
      <div class="cont_feed_barra">
        <img src="img/searchbar.png" class="cont_feed_barraimg">
        <input type="text" id="searchbar" name="searchbar" placeholder="Pesquise perfis ou estilos..."
          class="cont_feed_barrain">
      </div>

      
    <div class="space_cont_bar"></div>

    <?php if (isset($user_data)): ?>

      
      <div class="cont_feed_publi">
        <div class="cont_feed_publi_dados">
          
        </div>

        <div class="cont_feed_publi_text">
        </div>
      </div>


      <div class="space_cont_publi"></div>


      <div class="cont_feed_publi">
        <div class="cont_feed_publi_dados">
        </div>

        <div class="cont_feed_publi_text">
        </div>
      </div>

      <?php else:?>
 <p>Usuário não encontrado.</p>
<?php endif;?>

      
    </div>





  </main>



  <script src="script.js"></script>


</body>




</html>