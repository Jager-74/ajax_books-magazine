<?php

/**
 * Created by PhpStorm.
 * User: Jager
 * Date: 08.02.17
 * Time: 13:03
 */

class Books
{
    public  $isdn;
    public  $author;
    public  $title;
    public  $catid;
    public  $price;
    public  $description;

    //private $db;// = new PDO('mysql:host=localhost;dbname=s1',"admin","admin");

    function __construct($isdn,$author,$title,$catid,$price,$description) {
        $this->isdn = $isdn;
        $this->author = $author;
        $this->title = $title;
        $this->catid = $catid;
        $this->price = $price;
        $this->description = $description;
    }

    /**
     * @param $isbn
     * @return mixed
     */
    public static function getBook($isbn)
    {
        $mysqli = Books::dbConnect();
        $res = $mysqli->query("SELECT * FROM books WHERE isbn = " . $isbn);
        return $res;
    }

    /**
     * @return mixed
     */
    public static function getAllBook()
    {
        $mysqli = Books::dbConnect();
        $res = $mysqli->query("SELECT * FROM books");
        return $res;
    }

    /**
     * @return mixed
     */
    public static function addBook($isdn,$author,$title,$catid,$price,$description)
    {
        $mysqli = Books::dbConnect();
        //$res = ;
        $q = "INSERT INTO `books` (`isbn`,`author`,`title`,`catid`,`price`,`description`) VALUES ('".$isdn."','".$author."','".$title."','".$catid."','".$price."','".$description."')";
        if(!$mysqli->query($q)){
            return "Ошибка добавления: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
    /**
     * @return mixed
     */
    public static function delBook($isdn)
    {
        $mysqli = Books::dbConnect();
        //$res = ;
        $q = "DELETE FROM `books` WHERE `isbn` = '".$isdn."'";
        if(!$mysqli->query($q)){
            return "Ошибка добавления: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }

    /**
     * @return mixed
     */
    protected static function dbConnect(){
        $mysqli = new mysqli('localhost', "admin", "admin", 'book_sc');
        $mysqli->set_charset("utf8");
        if ($mysqli->connect_errno) {
            return "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }else
            return $mysqli;
    }

}