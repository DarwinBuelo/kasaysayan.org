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
$cssList = [
    '/res/lib/bootstrap-4.0.0/dist/css/bootstrap.min.css',
    '/res/css/timeline.min.css',
    '/res/css/styles.css'
];

$jsList =[
    '/res/js/jquery-3.2.1.slim.js',
    '/res/js/timeline.min.js'

];


$Outline = new Layout('Kasaysayan.org');
$Outline->addCss($cssList);
$Outline->addJS($jsList);
$Outline->setLogo('/res/images/logo.png');
