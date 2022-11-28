<?php

include('code/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fiomória | olá, <?php echo $_SESSION['user'] ?>!</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="style/fiomoria.css">
    <link rel="stylesheet" href="style/balao.css">
</head>

<body>
    <header>
        <ul>
            <li>
                <select name="modo de jogo">
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
            <li>
                <a href="../">Início</a>
            </li>
            <li>
                <a href="code/logout">Deslogar</a>
            </li>
        </ul>
    </header>

    <section class="fiomoria-game">
        <div class="fiomoria-carta" data-framework="fionaHumana">
            <img class="frente" src="img/fionaHumana.jpg" alt="Fiona Humana">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="fionaHumana">
            <img class="frente" src="img/fionaHumana.jpg" alt="Fiona Humana">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="burro">
            <img class="frente" src="img/burro.jpg" alt="Burro">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="burro">
            <img class="frente" src="img/burro.jpg" alt="Burro">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="burroAlazao">
            <img class="frente" src="img/burroAlazao.jpg" alt="Burro alazão">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="burroAlazao">
            <img class="frente" src="img/burroAlazao.jpg" alt="Burro alazão">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="fiona">
            <img class="frente" src="img/fiona.jpg" alt="Fiona">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="fiona">
            <img class="frente" src="img/fiona.jpg" alt="Fiona">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="shrek">
            <img class="frente" src="img/shrek.jpg" alt="Shrek">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="shrek">
            <img class="frente" src="img/shrek.jpg" alt="Shrek">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="shrekHumano">
            <img class="frente" src="img/shrekHumano.jpg" alt="Shrek humano">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="shrekHumano">
            <img class="frente" src="img/shrekHumano.jpg" alt="Shrek humano">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="farquaad">
            <img class="frente" src="img/farquaad.jpg" alt="Farquaad">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="farquaad">
            <img class="frente" src="img/farquaad.jpg" alt="Farquaad">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="fada">
            <img class="frente" src="img/fada.jpg" alt="Fada madrinha">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="fada">
            <img class="frente" src="img/fada.jpg" alt="Fada madrinha">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="gato">
            <img class="frente" src="img/gato.jpg" alt="Gato de botas">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="gato">
            <img class="frente" src="img/gato.jpg" alt="Gato de botas">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="rumple">
            <img class="frente" src="img/rumple.jpg" alt="Rumpel Stiltskin">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="rumple">
            <img class="frente" src="img/rumple.jpg" alt="Rumpel Stiltskin">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="dragao">
            <img class="frente" src="img/dragao.jpg" alt="Dragão">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="dragao">
            <img class="frente" src="img/dragao.jpg" alt="Dragão">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="encantado">
            <img class="frente" src="img/encantado.jpg" alt="Encantado">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>

        <div class="fiomoria-carta" data-framework="encantado">
            <img class="frente" src="img/encantado.jpg" alt="Encantado">
            <img class="verso" src="img/verso.jpeg" alt="verso da carta">
        </div>
    </section>
    
    <script src="code/fiomoria.js"></script>
</body>
</html>