<?php
session_start();
if (empty($_SESSION['usuario'])) {
    echo "<script>location.href='index.php';</script>";
    exit;
}

include_once('conexao.php');
$sql = "SELECT * FROM usuario";
$result = $con->query($sql);

if ($result === false) {
    die("Erro na consulta: " . $con->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>LISTANDO DADOS DA TABELA CLIENTE</h2>
    <a href='logout.php'>Sair</a>
    <table border="2">
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
        <?php while ($user_data = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($user_data['nome']) ?></td>
                <td><?= htmlspecialchars($user_data['email']) ?></td>
                <td><a href='#'><img src='../img/editar.png' /></a></td>
                <td><a href='#'><img src='../img/excluir.png' /></a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
