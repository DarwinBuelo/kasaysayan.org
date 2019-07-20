<?php

class C {
    /**
     * @var contains the Container Class
     */
    
    static function debug($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }


    function __construct()
    {
        $this->setOutline();



    }



}