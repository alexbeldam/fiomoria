<?php

include('conect.php');

if (is_null($_SESSION['record']) || $_POST['record'] < $_SESSION['record']) {
    $novo_record = $_POST['record'];
    $_SESSION['record'] = $novo_record;
    $user = $_SESSION['user'];
    $sql_code = "UPDATE usuarios SET record = '$novo_record' WHERE user = '$user'";
    $sql_query = $mysqli->query($sql_code);

    echo 1;
}
else 
    echo 0;