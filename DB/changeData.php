<?php
include_once('DB.php');

if (!isset($_POST['Name'])) {
    header('Location: ../admin.php');
}

$db = new DB();

$uploaddir = '../img/box/';
$_FILES['Picture']['name'] = '1' . $_FILES['Picture']['name'];
$uploadfile = $uploaddir . basename($_FILES['Picture']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['Picture']['tmp_name'], $uploadfile)) {
    echo "Fails ir derīgs un tika veiksmīgi augšupielādēts.\n";
} else {
    echo "Fails nav augšupielādēts.\n";
}

$_POST['Picture'] = $_FILES['Picture']['name'];

$link = $db->connect();

$sql = "SELECT * FROM posts WHERE Name = '{$_POST['Name']}'";
if ($result = mysqli_query($link, $sql)) {
    foreach ($result as $row) {
        $db->setVars($row);
        $db->setVars($_POST);
        
        $db->changeQuery($link);
        
        header('Location: ../admin.php');
    }
}