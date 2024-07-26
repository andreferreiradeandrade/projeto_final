<?php
include_once('conexao.php');

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $senha = $_POST['senha'];
    $usu = $_POST['nome'];
    $email = $_POST['email'];

    // Atualiza os dados do usuário no banco de dados
    $sqlatualiza = "UPDATE usuario SET nome='$usu', email='$email', senha='$senha' WHERE id='$id'";
    $result = $con->query($sqlatualiza);

    if ($result) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $con->error;
    }
}

// Redireciona de volta para a página de edição (edit.php)
header('Location: listando.php?id=' . $id);
?>
