<?php

class DB
{
    private $server = "localhost";
    private $login = "root";
    private $password = '';
    private $database = "saulite";
    private $id = 0;
    private $name = '';
    private $type = 0;
    private $date = '';
    private $price = 0;
    private $info = '';
    private $picture = '';
    private $filter = '';
    private $historyID = 0;
    private $historyTime = '';
    private $historyResult = '';

    public function getID()
    {
        return htmlentities($this->id);
    }
    public function getName()
    {
        return htmlentities($this->name);
    }
    public function getType()
    {
        return htmlentities($this->type);
    }
    public function getDate()
    {
        return htmlentities($this->date);
    }
    public function getPrice()
    {
        return htmlentities($this->price);
    }
    public function getInfo()
    {
        return htmlentities($this->info);
    }
    public function getPicture()
    {
        return htmlentities($this->picture);
    }
    public function getFilter()
    {
        return htmlentities($this->filter);
    }
    public function getHistoryID()
    {
        return htmlentities($this->historyID);
    }
    public function getHistoryTime()
    {
        return htmlentities($this->historyTime);
    }
    public function getHistoryResult()
    {
        return htmlentities($this->historyResult);
    }

    public function connect()
    {
        $link = mysqli_connect($this->server, $this->login, $this->password, $this->database);
        if ($error = $link->connect_error) {
            die("Savienojums neizdevās: " . $error);
        }
        return $link;
    }

    public function writeQuery($link)
    {
        $sql = "INSERT INTO posts (name, date, price, info, filter, picture)
        VALUES ('{$this->name}','{$this->date}','{$this->price}','{$this->info}','{$this->filter}','{$this->picture}')";

        if (mysqli_query($link, $sql))
            header('Location: ../admin.php');
        else
            echo "Kļūda: " . $link->error;
    }

    public function changeQuery($link)
    {
        $sql = "UPDATE `posts` SET `Name`='[value-2]',`Type`='[value-3]',`Date`='[value-4]',`Price`='[value-5]',`Info`='[value-6]',`Picture`='[value-7]',`Filter`='[value-8]'";

        if (mysqli_query($link, $sql))
            header('Location: ../admin.php');
        else
            echo "Kļūda: " . $link->error;
    }

    public function setVars($row)
    {
        if (isset($row['ID']))
            $this->id = strip_tags(trim($row['ID']));
        if (isset($row['Name']))
            $this->name = strip_tags(trim($row['Name']));
        if (isset($row['Type']))
            $this->type = strip_tags(trim($row['Type']));
        if (isset($row['Date']))
            $this->date = strip_tags(trim($row['Date']));
        if (isset($row['Price']))
            $this->price = strip_tags(trim($row['Price']));
        if (isset($row['Info']))
            $this->info = strip_tags(trim($row['Info']));
        if (isset($row['Picture']))
            $this->picture = strip_tags(trim($row['Picture']));
        if (isset($row['Filter']))
            $this->filter = strip_tags(trim($row['Filter']));
    }

    public function setHistory($id, $time, $result)
    {
        $this->historyID = strip_tags(trim($id));
        $this->historyTime = strip_tags(trim($time));
        $this->historyResult = strip_tags(trim($result));
    }
    public function writeHistory($link)
    {
        $sql = "INSERT INTO `search_history` (Time, Result) VALUES ('{$this->historyTime}','{$this->historyResult}')";

        if (!mysqli_query($link, $sql))
            echo "Kļūda: " . $link->error;
    }

    public function deleteRow($link, $key)
    {
        $sql = "DELETE FROM `posts` WHERE Name = '{$key}'";
        $sqlFile = "SELECT Picture FROM `posts` WHERE Name = '{$key}'";
        if ($result = mysqli_query($link, $sqlFile)) {
            foreach ($result as $row) {
                if (!unlink('../img/box/' . $row['Picture']))
                    throw new \RuntimeException("Neizdevās atsaistīt {$row}: " . var_export(error_get_last(), true));
            }
            if (mysqli_query($link, $sql)) {
                header('Location: ../admin.php');
            }
        } else
            echo "Kļūda: " . $link->error;
    }
    public function searchTool($filter)
    {
        if (stripos($this->name, $filter))
            return true;
        if (stripos($this->price, $filter))
            return true;
        if (stripos($this->info, $filter))
            return true;
        if (stripos($this->filter, $filter))
            return true;
        return false;
    }
}