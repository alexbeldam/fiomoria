<?php
include('connect.php');

if (!isset($_GET['record']))
    return;
if (!isset($_SESSION))
    session_start();

$current_record = $_SESSION['record'];
$sent_record = $_GET['record'];

if ($current_record == null || $sent_record < $current_record) {
    $_SESSION['record'] = $sent_record;
    $user = $_SESSION['username'];
    $update_request = 'UPDATE users SET record = ? WHERE username = ?';
    $stmt = $con->prepare($update_request);

    $stmt->bind_param('is', $sent_record, $user);
    $stmt->execute();
    $stmt->close();

    if ($con->error)
        die('Falha ao atualizar: ' . $con->error);

    echo 1;
}
else 
    echo 0;