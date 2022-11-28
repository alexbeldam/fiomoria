<?php

if (isset($_POST['user'])) {
    include('../../code/conect.php');

    $user = $mysqli->real_escape_string($_POST['user']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $avatar = $_POST['avatar'];

    $sql_code = "SELECT * FROM usuarios WHERE user = '$user'";
    $sql_query = $mysqli->query($sql_code);

    if (!($sql_query->num_rows)) {
        $mysqli->query("INSERT INTO usuarios (user, senha, avatar) VALUES('$user', '$hash', '$avatar')");

        header("location: ../login");
    }
    else
        echo 1;
}