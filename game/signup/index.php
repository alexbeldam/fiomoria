<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja bem-vinde</title>
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" href="../style/entergame.css">
</head>
<body>
    <section id="signup">
        <div>
            <figure>
                <img src="../img/logo.png" id="logo">
            </figure>
            <form method="post" action="">
                <input type="text" name="username" placeholder="Nome de Usuário" minlength="5" maxlength="32" required autofocus>
                <label id="avatar">
                    Seu Avatar:
                    <ul class="avatars">
                        <li class="avatar fiona">
                            <input type="radio" name="avatar" value="0" id="fiona" require>
                            <label for="fiona">Fiona</label>
                        </li>
                        <li class="avatar shrek">
                            <input type="radio" name="avatar" value="1" id="shrek" required>
                            <label for="shrek">Shrek</label>
                        </li>
                        <li class="avatar burro">
                            <input type="radio" name="avatar" value="2" id="burro" required>
                            <label for="burro">Burro</label>
                        </li>
                        <li class="avatar gato">
                            <input type="radio" name="avatar" value="3" id="gato" required>
                            <label for="gato">Gato de Botas</label>
                        </li>
                    </ul>
                </label>
                <input type="password" name="senha" placeholder="Sua Senha" minlength="5" maxlength="16" required>
                <input type="submit" value="CADASTRAR">
            </form>
            <p>Já tem cadastro? <a href="../">Logar</a></p>
        </div>
    </section>
</body>
</html>

<?php
if (!isset($_POST['username']))
    return;

include('../code/connect.php');

$username = $con->real_escape_string($_POST['username']);
$senha = $con->real_escape_string($_POST['senha']);
$hash = password_hash($senha, PASSWORD_DEFAULT);
$avatar = $_POST['avatar'];

$select_request = 'SELECT id FROM users WHERE username = ?';
$stmt = $con->prepare($select_request);

$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->error)
    die('Falha ao selecionar: ' . $stmt->error);

if ($stmt->num_rows == 0) {
    $insert_request = 'INSERT INTO users (username, senha, avatar) VALUES(?, ?, ?)';

    $stmt->close();

    $stmt = $con->prepare($insert_request);

    $stmt->bind_param('ssi', $username, $hash, $avatar);
    $stmt->execute();

    if ($stmt->error)
        die('Falha ao inserir: ' . $stmt->error);

    $stmt->close();
    header('location: ../');
}

echo '<script src="code/input.js"></script>';

$stmt->close();