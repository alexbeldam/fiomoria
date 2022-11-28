<?php

include('code/protect.php');
include('code/rank.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fiomória | olá, <?php echo $_SESSION['user'] ?>!</title>
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
                    <option value="0">Facílimo</option>
                    <option value="1">Fácil</option>
                    <option value="2">Médio</option>
                    <option value="3">Difícil</option>
                    <option value="4">Se coloca no lugar dela</option>
                </select>
            </li>
            <li>
                <button id="joga">Jogar</button>
            </li>
            <li onclick="location.href = '../'"><p>Início</p></li>
            <li onclick="location.href = 'code/logout'"><p>Deslogar</p></li>
        </ul>
    </header>

    <section class="fiomoria-game"></section>
    
    <script src="code/fiomoria.js"></script>
</body>
</html>