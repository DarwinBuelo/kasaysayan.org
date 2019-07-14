<?php
/**
 * This is where the settings  of the whole app will go
 */


// Company information
define('COMPANY_NAME','Kasaysayan.org',true);
define('COMPANY_DESC','Test Description',true);

//Database Configuration
define('DATABASE_NAME','kasaysayan',true);
define('DATABASE_PASSWORD','kasaysayan',true);

//Build Mode
define('PRODUCTION_MODE',false);

spl_autoload_register(function($class) {
    require_once "class/".$class.".php";
});

//initialize classes

$Outline = new Container();