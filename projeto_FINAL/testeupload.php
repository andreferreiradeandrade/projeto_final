<?php
session_start();
include_once('conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usu'])) {
    die('Você precisa estar logado para acessar esta página.');
}

$id_usu = $_SESSION['id_usu']; // ID do usuário logado

// Verifica se a imagem foi enviada
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $targetDir = "C:/root/http/projeto_FINAL/img/"; // Pasta para armazenar as imagens
    $fileName = uniqid() . "_" . basename($_FILES["imagem"]["name"]);   
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Verifica o tipo de arquivo (opcional)
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowedTypes)) {
        // Move o arquivo para o servidor
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFilePath)) {
            // Atualiza o caminho da imagem no banco de dados
            $sql = "UPDATE usuario SET imagem = ? WHERE id_usu = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("si", $fileName, $id_usu); // Armazena apenas o nome do arquivo no banco

            if ($stmt->execute()) {
                echo "Imagem de perfil atualizada com sucesso!";
            } else {
                echo "Erro ao atualizar o perfil no banco de dados.";
            }
        } else {
            echo "Erro ao fazer o upload da imagem.";
        }
    } else {
        echo "Tipo de arquivo não permitido. Use JPG, JPEG, PNG ou GIF.";
    }
} else {
    echo "Nenhuma imagem enviada ou houve um erro.";
}

if (isset($stmt)) {
    $stmt->close();
}
$con->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem de Perfil</title>
</head>
<body>

<form method="POST" enctype="multipart/form-data">
    <label for="imagem">Escolha uma imagem para o perfil:</label>
    <input type="file" name="imagem" id="imagem" accept="image/*" required>
    <button type="submit">Atualizar Perfil</button>
</form>

</body>
</html>
