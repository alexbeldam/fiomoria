<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="icon" href="../img/icon.png">
    <link rel="stylesheet" href="../style/entergame.css">
</head>
<body>
    <section>
        <div>
            <figure>
                <img src="../img/logo.png" id="logo">
            </figure>
            <form method="post" action="">
                <input type="text" name="username" placeholder="Nome de Usuário" minlength="5" maxlength="32" required autofocus>
                <input type="password" name="senha" placeholder="Sua Senha" minlength="5" maxlength="16" required>
                <input type="submit" value="ENTRAR">
            </form>
            <p>Ainda não tem cadastro? <a href="../signup/">Cadastre-se</a></p>
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

$select_request = 'SELECT senha, record FROM users WHERE username = ?';
$stmt = $con->prepare($select_request);

$stmt->bind_param('s', $username);
$stmt->execute();

$select_query = $stmt->get_result();

if ($stmt->error)
    die('Falha ao selecionar: ' . $stmt->error);
if ($select_query->num_rows == 0) {
    $stmt->close();
    header('location: ../signup');
}

$user = $select_query->fetch_assoc();
$stmt->close();

if (password_verify($senha, $user['senha'])) {
    if (!isset($_SESSION))
        session_start();

    $_SESSION['username'] = $username;
    $_SESSION['record'] = $user['record'];
    
    header('location: ../');
}
 
echo '<script src="code/input.js"></script>';