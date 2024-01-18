<?php
include_once('DB.php');

if (!isset($_POST['name'])) {
    header('Location: ../admin.php');
}

$db = new DB();

$link = $db->connect();

$db->deleteRow($link, $_POST['numberDelete']);