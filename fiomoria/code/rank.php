<?php

include('conect.php');

$rank;

$sql_code = "SELECT * FROM usuarios WHERE record != 'NULL' ORDER BY record";
$sql_query = $mysqli->query($sql_code);

if ($sql_query->num_rows === 0)
{
    $rank['users'] = '';
    $rank['avatars'] = '';
    $rank['records'] = '';
}
else if ($sql_query->num_rows === 1) {
    $player = $sql_query->fetch_assoc();

    $rank['users'] = $player['user'];
    $rank['avatars'] = $player['avatar'];
    $rank['records'] = $player['record'];
}
else if ($sql_query->num_rows === 2) {
    $player1 = $sql_query->fetch_assoc();
    $player2 = $sql_query->fetch_assoc();

    $users = array($player1['user'], $player2['user']);
    $avatars = array($player1['avatar'], $player2['avatar']);
    $records = array($player1['record'], $player2['record']);

    $rank['users'] = $users;
    $rank['avatars'] = $avatars;
    $rank['records'] = $records;
}
else {
    $player1 = $sql_query->fetch_assoc();
    $player2 = $sql_query->fetch_assoc();
    $player3 = $sql_query->fetch_assoc();

    $users = array($player1['user'], $player2['user'], $player3['user']);
    $avatars = array($player1['avatar'], $player2['avatar'], $player3['avatar']);
    $records = array($player1['record'], $player2['record'], $player3['record']);

    $rank['users'] = $users;
    $rank['avatars'] = $avatars;
    $rank['records'] = $records;
}