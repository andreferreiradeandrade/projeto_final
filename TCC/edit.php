<?php
include_once('conexao.php');

$usu = '';
$email = '';
$senha = '';
$id = '';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sqlconsulta = "SELECT * FROM usuario WHERE id = $id";
    $result = $con->query($sqlconsulta);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $usu = $user_data['nome'];
        $email = $user_data['email'];
        $senha = $user_data['senha'];
        $id = $user_data['id'];
    } else {
        header('Location: listando.php');
        exit; // Se não houver resultados, redireciona para listando.php
    }
} else {
    header('Location: listando.php');
    exit; // Se não houver id na URL, redireciona para listando.php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Usuário</title>
</head>
<body>
    <div class="box">
        <form action="atualiza.php" method="POST">
            <fieldset>
                <legend><b>Editar Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo htmlspecialchars($usu); ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo htmlspecialchars($email); ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo htmlspecialchars($senha); ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input type="submit" name="update" id="update" value="Atualizar">
            </fieldset>
        </form>
    </div>
</body>
</html>
