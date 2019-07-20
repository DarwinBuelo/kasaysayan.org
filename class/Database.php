<?php
/**
 *  Class Database
 *  @author Darwin Buelo
 *  @version 1.0.0
 */
class Database
{
    //define the variable needed
    static public $host;
    static public $username;
    static public $password;
    static public $dbname;

    static protected $conn;

    // this sets the limit in searching making
    // pagination
    static $limits = 10;


    /*	TODO: Make an array of search fields
    *		  this will insure that the user can change the search paramerters
    */
    public $searchdata = []; // use for advance search settings


    //Connect to the database


    static function connect()
    {
        try {
            self::$conn = mysqli_connect(self::$host, self::$username, self::$password, self::$dbname);
        } catch (Exception $e) {
            echo "<pre>" . $e . "</pre>";
        }
    }


    static function query($query)
    {
        self::connect();
        $result = mysqli_query(self::$conn, $query) or die(mysqli_error(self::$conn));
        self::close();
        return $result;
    }

    //clean the data before posting it to the data base
    static function clean($x)
    {
        if ($x <> null) {
            $x = stripcslashes($x);
            $x = mysqli_real_escape_string(self::$conn, $x);
            return $x;
        } else {
            return false;
        }

    }

    static function close()
    {
        mysqli_close(self::$conn);
    }

    //destroy the connection every time the page is closed
    function __destruct()
    {
        mysqli_close(self::$conn);
    }
}


