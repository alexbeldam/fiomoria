<?php
include('connect.php');
include('time.php');

$rank_request = 'SELECT username, avatar, record FROM users WHERE record IS NOT NULL ORDER BY record';
$rank_query = $con->query($rank_request);

if ($con->error) 
    die('Falha ao selecionar usuarios: ' . $con->error);

$rank = $rank_query->fetch_all(MYSQLI_ASSOC);

for ($i = 0; $i < min(3, count($rank)); ++$i) {
    echo '<li><ul><li>';
    echo '<img src="img/avatar' . ($rank[$i]['avatar'] + 1) . '.jpg"></li>';
    echo '<li class="center">' . $rank[$i]['username'] . '</li>';
    echo '<li class="center"> record: ';

    echo formatTime($rank[$i]['record']);

    echo '</li></ul></li>';
}