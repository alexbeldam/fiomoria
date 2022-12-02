<?php

include('conect.php');

$rank;

$sql_code = "SELECT * FROM usuarios WHERE record != 'NULL' ORDER BY record";
$sql_query = $mysqli->query($sql_code);

$player1 = $sql_query->fetch_assoc();
$player2 = $sql_query->fetch_assoc();
$player3 = $sql_query->fetch_assoc();

$users = array($player1['user'], $player2['user'], $player3['user']);
$avatars = array($player1['avatar'], $player2['avatar'], $player3['avatar']);
$records = array($player1['record'], $player2['record'], $player3['record']);

$rank['users'] = $users;
$rank['avatars'] = $avatars;
$rank['records'] = $records;

?>

<li>
    <ul>
        <li>
            <img src="img/avatar<?php echo ($rank['avatars'][0] + 1) ?>.jpg">
        </li>
        <li class="center">
            <?php echo $rank['users'][0] ?>
        </li>
        <li class="center" id="top1">
            record:
            <?php
                if ($rank['records'][0] == 60)
                    echo '1min';
                else if ($rank['records'][0] > 60)
                    echo '1min ' . ($rank['records'][0] - 60) . 's';
                else
                    echo $rank['records'][0] . 's';
            ?>
        </li>
    </ul>
</li>
<li>
    <ul>
        <li>
            <img src="img/avatar<?php echo ($rank['avatars'][1] + 1) ?>.jpg">
        </li>
        <li class="center">
            <?php echo $rank['users'][1] ?>
        </li>
        <li class="center" id="top2">
            record:
            <?php
            if ($rank['records'][1] == 60)
                echo '1min';
            else if ($rank['records'][1] > 60)
                echo '1min ' . ($rank['records'][1] - 60) . 's';
            else
                echo $rank['records'][1] . 's';
            ?>
        </li>
    </ul>
</li>
<li>
    <ul>
        <li>
            <img src="img/avatar<?php echo ($rank['avatars'][2] + 1) ?>.jpg">
        </li>
        <li class="center" id="top3">
            <?php echo $rank['users'][2] ?>
        </li>
        <li class="center">
            record:
            <?php
                if ($rank['records'][2] == 60)
                    echo '1min';
                else if ($rank['records'][2] > 60)
                    echo '1min ' . ($rank['records'][2] - 60) . 's';
                else
                    echo $rank['records'][2] . 's';
            ?>
        </li>
    </ul>
</li>
