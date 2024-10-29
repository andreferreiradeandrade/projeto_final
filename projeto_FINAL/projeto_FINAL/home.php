<!DOCTYPE html>
<html lang="pt-br">



<head>

<?php
    session_start();
    include_once('conexao.php');
    if (!isset($_SESSION['id_usu'])) {
        die('Você precisa estar logado para acessar');
    }

    // captura a categoria do usuário
    $id_usu = $_SESSION['id_usu'];
    $sql = "SELECT * FROM usuario WHERE id_usu = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id_usu); // Correção
    $stmt->execute();
    $result = $stmt->get_result();
    $categoria = $result->fetch_assoc()['categoria']; // Correção

    // consulta para obter todas as publicações na ordem correta
    $sql = "SELECT p.*, u.nome, u.categoria
    FROM publicacoes p 
    JOIN usuario u ON p.publi_id_usuarios = u.id_usu
    ORDER BY CASE WHEN u.categoria = ? THEN 0 ELSE 1 END, p.id_publi DESC";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $categoria); // Correção: deve ser o tipo correto
    $stmt->execute();
    $result = $stmt->get_result();
    $categoria_usu= "";

    // consulta que obtém todas as publicações, ordenando conforme o tipo de usuario
    $publicacoes = [];
    while ($row = $result->fetch_assoc()) {
        $publicacoes[] = $row;
    }



   
    ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="stylehome.css?v=<?= time(); ?>" rel="stylesheet" type="text/css"/>

  
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
      <a href= "perfil.php"><button class="cont_menu_lateral_bot"><img src="img/menuicon.png" class="cont_menu_lateral_botimg"></button></a>
    </div>





    <div class="cont_feed">


      
      <div class="cont_feed_barra">
        <img src="img/searchbar.png" class="cont_feed_barraimg">
        <input type="text" id="searchbar" name="searchbar" placeholder="Pesquise perfis ou estilos..."
          class="cont_feed_barrain">
          <div class ="space_barr"></div>
      </div>

      
    <div class="space_cont_bar"></div>


      <?php foreach ($publicacoes as $publicacao): 
        $img_cat = "";

    if ($publicacao['categoria_usu'] == "1"){
      $img_cat = "img/producericon.png";
    }
    else{
      $img_cat = "img/artisticon.png";
    }

        ?>
      <div class="cont_feed_publi">
        <div class="cont_feed_publi_dados">
          <p class= "usu_info"><?php echo htmlspecialchars($publicacao['nome'])?></p>
          <div class = "img_category_back">
          <img class="img_category" src ="<?php echo $img_cat;?>"/>
  </div>
        </div>

        <div class="cont_feed_publi_text">
          <p class= "publi_text"><?php echo htmlspecialchars($publicacao['legenda']);?></p>
        </div>
      </div>


      <div class="space_cont_publi"></div>

      <?php endforeach; ?>






      
    </div>





  </main>



  <script src="script.js"></script>


</body>




</html>