<?php
session_start();
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    if (!isset($_SESSION['id_usu'])) {
        die('Você precisa estar logado para publicar');
    }

    if (isset($_POST['legenda'])) {
        $conteudo = $_POST['legenda'];
        $id_usuario = $_SESSION['id_usu'];

        // Consulta para obter o tipo do usuário
        $sql = "SELECT categoria FROM usuario WHERE id_usu = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $categoria = $result->fetch_assoc()['categoria'];

        // Insere a publicação com o tipo do usuário
        $sql = "INSERT INTO publicacoes (publi_id_usuarios, legenda, categoria_usu) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssi", $id_usuario, $conteudo, $categoria); // Ajuste o tipo de dado conforme necessário

        if ($stmt->execute()) {
            echo "Publicação inserida com sucesso";
            header("Location: home.php");
        } else {
            echo "Erro ao publicar";
        }

        $stmt->close();
    }
}
?>
