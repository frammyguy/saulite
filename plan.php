<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/logo_small.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Pasākums</title>
</head>

<body>

    <?php

    include_once('DB/DB.php');

    $db = new DB;

    $link = $db->connect();

    $sql = 'SELECT * FROM posts';

    if ($result = mysqli_query($link, $sql))
        foreach ($result as $row) {
            if ($row['ID'] != $_GET['id'])
                continue;
            $db = new DB;
            $db->setVars($row);
        }
    ?>

    <section class="mainPage">
        <?php
        include_once('pages/_header.php');
        ?>
        <div class="leftSide">
            <a href="/saulite">
                <img src="icons/logo_big.svg" alt="main logo">
            </a>
        </div>
        <div class="rightSide plan">
            <h1 class="planName">
                <?php echo $db->getName(); ?>
            </h1>
            <div class="planType">
                <?php
                if ($db->getType() == 1) {
                    echo 'Pašiem mazākajiem';
                } else if ($db->getType() == 2) {
                    echo 'Pamatklasēm';
                } else if ($db->getType() == 3) {
                    echo 'Pusaudžiem';
                } else {
                    echo ' ';
                }
                ?>
            </div>
            <div class="planBox">
                <div class="planBoxText">
                <?php echo $db->getInfo(); ?>
                </div>
                <div class="planBoxImg">
                    <button type="button" class="emptyButton" data-toggle="modal" data-target="#exampleModal">
                    <img src="img/box/<?php echo $db->getPicture(); ?>" alt="pasākumu foto">
                </div>
                <div class="planBoxImgPhone">
                    <img src="img/box/<?php echo $db->getPicture(); ?>" alt="pasākumu foto">
                </div>
            </div>
            <div class="planHaD"><b>Datums: </b>
                <?php echo $db->getDate(); ?>
            </div>
            <div class="planDaW"><b>Ieeja: </b>
                <?php 
                if ($db->getPrice() == 0) echo ('Bezmaksas');
                else echo $db->getPrice() . '€';
                ?>
            </div>
    </section>
    </div>

    <?php
    $db = null;
    include_once('pages/_footer.php');
    ?>

    <script src="https://kit.fontawesome.com/e779950260.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </script>
</body>

</html>