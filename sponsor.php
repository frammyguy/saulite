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
    <title>Sponsora konts</title>
</head>

<body class="adminBody">

    <a href="/saulite">
        <img class="adminImg" src="icons/logo_big.svg" alt="main logo">
    </a>
    <h2 class="adminTitle">Sponsora konts</h2>

    <div class="btnAdminBox">
        <button id="adminAddBtn" class="btn btn-dark">
            Izveidot programmu
        </button>
        <button id="adminChangeBtn" class="btn btn-dark">
            Izmainīt programmu
        </button>
        <button id="adminRemoveBtn" class="btn btn-dark">
            Dzēst programmu
        </button>
        <button id="HistoryBtn" class="btn btn-dark">
            Meklēšanas vēsture
        </button>
    </div>

    <?php
    include_once('DB/DB.php');
    ?>

    <div id="adminForm">
        <form class="adminForm" action="DB/writeData.php" method="POST" enctype="multipart/form-data">
            <label for="type">Izvēlieties vecumu*</label>
            <select name="Type" id="type">
                <option id="targetOption" value="0" hidden selected></option>
                <option value="1">Pašiem mazākajiem</option>
                <option value="2">Pamatklasēm</option>
                <option value="3">Pusaudžiem</option>
            </select>

            <label for="name">Ievadiet programmas nosaukumu*</label>
            <input name="Name" type="text" id="name">

            <label for="date">Ievadiet pasākumu norises dati*</label>
            <input name="Date" type="text" id="category">

            <label for="price">Ievadiet biļetes cenu*</label>
            <input name="Price" type="text" id="form">

            <label for="info">Ievadiet papildu informāciju (ja pieejama)</label>
            <textarea name="Info" id="info" cols="30" rows="5"></textarea>

            <label for="filter">Ievadiet filtru (atdalot ar komatiem)</label>
            <input name="Filter" type="text" id="filter">

            <label for="picture">Augšupielādējiet attēlu (ne vairāk kā 2 MB)</label>
            <input name="Picture" type="file" accept=".jpg, .png, .gif, .jpeg" id="picture">

            <div class="adminButtons">
                <button class="btn btn-success" type="submit">Izveidot</button>
            </div>

        </form>

    </div>

    
    <div id="adminChangeForm">
<?php
        if (!isset($_POST['Name'])) {

?>

        <form class="adminChangeInput" action="admin.php" method="POST" enctype="multipart/form-data">
            <input id="openjscript" value="" hidden></input>
            <label for="name">Ievadiet programmas nosaukumu</label>
            <input name="Name" type="text" id="name">
            <div class="adminButtons">
                <button class="btn btn-success" type="submit">Izvēlēties</button>
            </div>
        </form>
<?php
        } else {

        $db = new DB;
        $link = $db->connect();
        $sql = "SELECT * FROM posts WHERE Name = '{$_POST['Name']}'";
            if ($result = mysqli_query($link, $sql)) {
                foreach ($result as $row) {
?>
                    <form class="adminChangeForm" action="DB/changeData.php" method="POST" enctype="multipart/form-data">
                        <input id="openjscript" value="+" hidden></input>
                        <label for="type">Izvēlieties vecumu*</label>
                        <select name="Type" id="type">
                            <option value="1" <?php if ($row['Type'] == 1) echo 'selected'; ?>>Pašiem mazākajiem</option>
                            <option value="2" <?php if ($row['Type'] == 2) echo 'selected'; ?>>Pamatklasēm</option>
                            <option value="3" <?php if ($row['Type'] == 3) echo 'selected'; ?>>Pusaudžiem</option>
                        </select>

                        <label for="name">Ievadiet programmas nosaukumu*</label>
                        <input name="Name" type="text" id="name" value="<?php echo $row['Name'] ?>" disabled>

                        <label for="date">Ievadiet pasākumu norises dati*</label>
                        <input name="Date" type="text" id="category" value="<?php echo $row['Date'] ?>">

                        <label for="price">Ievadiet biļetes cenu*</label>
                        <input name="Price" type="text" id="form" value="<?php echo $row['Price'] ?>">

                        <label for="info">Ievadiet papildu informāciju (ja pieejama)</label>
                        <textarea name="Info" id="info" cols="30" rows="5"><?php echo $row['Info'] ?></textarea>

                        <label for="filter">Ievadiet filtru (atdalot ar komatiem)</label>
                        <input name="Filter" type="text" id="filter" value="<?php echo $row['Filter'] ?>">

                        <label for="picture">Augšupielādējiet attēlu (ne vairāk kā 2 MB)</label>
                        <input name="Picture" type="file" accept=".jpg, .png, .gif, .jpeg" id="picture">

                        <div class="adminButtons">
                            <button class="btn btn-success" type="submit">Izmainīt</button>
                            <a href="sponsor"><button class="btn btn-danger">Atteikties</button></a>
                        </div>
                    </form>
<?php
                }
            }
        }
?>
    </div>
    
    <div id="adminRemoveForm">
        <form class="adminRemoveForm" action="DB/removeData.php" method="POST">
            <label for="numberDelete">Ievadiet tās programmas nosaukumu, kuru vēlaties noņemt</label>
            <input name="numberDelete" id="numberDelete" type="text">
            <button type="submit" class="btn btn-danger adminRemoveButton">Dzēst</button>
        </form>
    </div>
    <div id="HistoryForm">
        <table class="historyTable">
            <?php
            $db = new DB;

            $link = $db->connect();

            $sql = 'SELECT * FROM search_history ORDER BY ID DESC';

            if ($result = mysqli_query($link, $sql))
                foreach ($result as $row) {
                    $db = new DB;
                    $db->setHistory($row['ID'], $row['Time'], $row['Result'], );
                    ?>
                    <tr>
                        <td>
                            <?php echo $db->getHistoryID(); ?>
                        </td>
                        <td>
                            <?php echo $db->getHistoryTime(); ?>
                        </td>
                        <td class="removeResult">
                            <?php echo $db->getHistoryResult(); ?>
                            <form action="DB/removeHistory.php" method="POST">
                                <input id="deleteId" name="deleteId" type="text" value="<?php echo $db->getHistoryID(); ?>"
                                    hidden>
                                <button class="btn btn-danger" type="submit">
                                    Dzēst
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        <form action="DB/removeHistory.php" method="POST">
            <input id="deleteAll" name="deleteAll" type="text" value="1" hidden>
            <button class="btn btn-danger" type="submit">
                Iztīrīt visu
            </button>
        </form>
    </div>

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
    <script src="js/admin.js"></script>
</body>

</html>