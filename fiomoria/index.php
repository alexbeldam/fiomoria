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
    <title>fiomória | olá,
        <?php echo $_SESSION['user'] ?>!
    </title>
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
            <li onclick="location.href = '../'">
                <p>Início</p>
            </li>
            <li onclick="location.href = 'code/logout'">
                <p>Deslogar</p>
            </li>
        </ul>
    </header>

    <section class="fiomoria-game"></section>

    <section class="rank sumiu">
        <h1>Seu tempo:</h1>
        <input type="time" disabled>
        <h1>Seu record:</h1>
        <p class="yrecord">
            <?php if ($_SESSION['record'] === 'NULL')
            echo 'nenhum';
        else
            echo $_SESSION['record'] . 's' ?>
        </p>
        <h1>Top 3 users:</h1>
        <ul>
            <li>
                <ul>
                    <li>
                        <img data-avatar="<?php echo $rank['avatars'][0] ?>">
                    </li>
                    <li class="center">
                        <?php echo $rank['users'][0] ?>
                    </li>
                    <li class="center">
                        record:
                        <?php echo $rank['records'][0] ?>s
                    </li>
                </ul>
            </li>
            <li>
                <ul>
                    <li>
                        <img data-avatar="<?php echo $rank['avatars'][1] ?>">
                    </li>
                    <li class="center">
                        <?php echo $rank['users'][1] ?>
                    </li>
                    <li class="center">
                        record:
                        <?php echo $rank['records'][1] ?>s
                    </li>
                </ul>
            </li>
            <li>
                <ul>
                    <li>
                        <img data-avatar="<?php echo $rank['avatars'][2] ?>">
                    </li>
                    <li class="center">
                        <?php echo $rank['users'][2] ?>
                    </li>
                    <li class="center">
                        record:
                        <?php echo $rank['records'][2] ?>s
                    </li>
                </ul>
            </li>
        </ul>
    </section>

    <script src="code/fiomoria.js"></script>
    <script src="code/rank.js"></script>
</body>

</html>