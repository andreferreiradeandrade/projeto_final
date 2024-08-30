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
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Erro na consulta: " . $con->error);
}


$user_data = $result->fetch_assoc();


$stmt->close();
$con->close();

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id_usu'])) {
    $id = $_GET['id_usu'];
    $sqlexcluir = "DELETE FROM usuario WHERE id_usu=?";
    $stmt_excluir = $con->prepare($sqlexcluir);
    $stmt_excluir->bind_param("i", $id);
    $result_excluir = $stmt_excluir->execute();

    if ($result_excluir) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir usuário: " . $con->error;
    }
    $stmt_excluir->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>

<body>
    <?php if (isset($user_data)): ?>
        
        <p>Nome: <?= htmlspecialchars($user_data['nome']); ?></p>
        <p>Email: <?= htmlspecialchars($user_data['email']); ?></p> 

    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>
</body>

</html>
