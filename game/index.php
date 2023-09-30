<?php
include('code/protect.php');
include('code/time.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiomória | olá, <?= $_SESSION['username'] ?>!</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="style/page.css">
    <link rel="stylesheet" href="style/game.css">
</head>
<body>
    <header>
        <ul>
            <li>
                <select name="game-mode">
                    <option value="" disabled selected>Selecione o modo de jogo</option>
                    <option value="-1">Facílimo (sem tempo irmão)</option>
                    <option value="0">Fácil (1min 30s)</option>
                    <option value="1">Médio (1min)</option>
                    <option value="2">Difícil (30s)</option>
                    <option value="3">Se coloca no lugar dela cinco segundos 🤚</option>
                </select>
            </li>
            <li>
                <button id="play">Jogar</button>
            </li>
            <li onclick="location.href = '../'">
                <p>Início</p>
            </li>
            <li onclick="location.href = 'code/logout.php'">
                <p>Deslogar</p>
            </li>
        </ul>
    </header>
    <section id="fiomoria-game"></section>
    <section id="rank" class="sumiu">
        <h1>Seu tempo:</h1>
        <p id="timer"></p>
        <h1>Seu record:</h1>
        <p id="record">
            <?php 
            $record = formatTime($_SESSION['record']);

            echo $record == null ? 'nenhum' : $record;
            ?>
        </p>
        <h1>Top 3 users:</h1>
        <ul id="top"></ul>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="code/fiomoria.js"></script>
    <script src="code/rank.js"></script>
</body>
</html>