<?php

include_once('DB.php');

$db = new DB();

$link = $db->connect();

if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];

    $sql = "DELETE FROM `search_history` WHERE ID = '{$deleteId}'";

    if (!mysqli_query($link, $sql))
        echo "Kļūda: " . $link->error;
    else
        header('Location: ../admin.php');
}

if (isset($_POST['deleteAll'])) {
    $sql = "TRUNCATE TABLE `search_history`";

    if (!mysqli_query($link, $sql))
        echo "Kļūda: " . $link->error;
    else
        header('Location: ../admin.php');
}