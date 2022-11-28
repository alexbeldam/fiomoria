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
            <div>
                <img src="../img/icon.png" id="logo">
            </div>

            <form method="post" action="">
                <input type="text" name="user" placeholder="Nome de Usuário" minlength="5" maxlength="32" required autofocus>
                <input type="password" name="senha" placeholder="Sua Senha" minlength="5" maxlength="16" required>
                <input type="submit" value="ENTRAR">
            </form>

            <p>Ainda não tem cadastro? <a href="../signup/">Cadastre-se</a></p>
        </div>
    </section>
</body>
</html>

<?php

if (isset($_POST['user'])) {
    include('../code/conect.php');
    
    $user = $mysqli->real_escape_string($_POST['user']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    
    $sql_code = "SELECT * FROM usuarios WHERE user = '$user'";
    $sql_query = $mysqli->query($sql_code);

    if (!($sql_query->num_rows)) 
        header("location: ../signup");
    else {
        $usuario = $sql_query->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            if (!isset($_SESSION))
                session_start();

            $_SESSION['user'] = $usuario['user'];
            $_SESSION['record'] = $usuario['record'];

            header("location: ../");
        }
        else 
            echo "<script src=\"code/input.js\"></script>";
    }
}