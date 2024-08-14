<?php
include_once('conexao.php');

if (isset($_POST['update'])) {
    $id = intval($_POST['id']); // Obtém o ID do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqlatualiza = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha' WHERE id_usu='$id'";
    $result = $con->query($sqlatualiza);

    if ($result) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $con->error;
    }

    // Redireciona de volta para a página de perfil
    header('Location: perfil.php');
    exit;
} else {
    header('Location: perfil.php');
    exit;
}
?>

