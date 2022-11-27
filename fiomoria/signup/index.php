<?php

if (isset($_POST['user'])) {
    include('../code/conect.php');

    $user = $mysqli->real_escape_string($_POST['user']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $avatar = $_POST['avatars'];

    $sql_code = "SELECT * FROM usuarios WHERE user = '$user'";
    $sql_query = $mysqli->query($sql_code);

    if (!($sql_query->num_rows)) {
        $mysqli->query("INSERT INTO usuarios (user, senha, avatar) VALUES('$user', '$hash', '$avatar')");

        header("location: ../login");
    }
}

?>

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
            <div>
                <img src="../img/icon.png" id="logo">
            </div>

            <form method="post" action="">
                <input type="text" name="user" placeholder="Nome de Usuário" minlength="5" maxlength="32" required autofocus>

                <label id="avatar">
                    Seu Avatar:
                    <ul class="avatars">
                        <li class="avatar fiona">
                            <input type="radio" name="avatars" value="0" id="fiona" require>
                            <label for="fiona">Fiona</label>
                        </li>

                        <li class="avatar shrek">
                            <input type="radio" name="avatars" value="1" id="shrek" required>
                            <label for="shrek">Shrek</label>
                        </li>

                        <li class="avatar burro">
                            <input type="radio" name="avatars" value="2" id="burro" required>
                            <label for="burro">Burro</label>
                        </li>

                        <li class="avatar gato">
                            <input type="radio" name="avatars" value="3" id="gato" required>
                            <label for="gato">Gato de Botas</label>
                        </li>
                    </ul>
                </label>

                <input type="password" name="senha" placeholder="Sua Senha" minlength="5" maxlength="16" required>
                <input type="submit" value="CADASTRAR">
            </form>

            <p>Já tem cadastro? <a href="../login/">Logar</a></p>
        </div>
    </section>
</body>

</html>