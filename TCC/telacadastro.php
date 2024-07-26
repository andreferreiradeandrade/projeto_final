<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="style/stylecadastro.css" rel="stylesheet" type="text/css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">

</head>

<body>
  <main>

    <div class="divlogo">
      <img src="img/logo.png" class="logo" />
    </div>

    <form class="form" action= "cadastro.php" method="POST">

      <h1 class="tit_cadastro">CADASTRO</h1>

      <div class="input_container">
        <label class="label_user">Usuário</label>
        <input type="text" name="usu" id="usu" class="inputxtuser">
      </div>


      <div class="input_container">
        <label class="label_email">Email</label>
        <input type="email" name="email" id="email" class="inputxtemail">
      </div>

      <div class="input_container">
        <label class="label_senha">Senha</label>
        <input type="password" name="senha" id="senha" class="inputxtsen">
      </div>

      <input type="submit" name="submit" id="submit" value="ENVIAR" class="enviar">

    </form>

  </main>


</body>

</html>