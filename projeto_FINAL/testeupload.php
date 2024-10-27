<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem de Perfil</title>
</head>
<body>

<form action="upload_imagem.php" method="POST" enctype="multipart/form-data">
    <label for="imagem">Escolha uma imagem para o perfil:</label>
    <input type="file" name="imagem" id="imagem" accept="image/*" required>
    <button type="submit">Atualizar Perfil</button>
</form>

</body>
</html>
