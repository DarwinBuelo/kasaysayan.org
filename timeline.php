<?php
require 'setting.php';
$Outline->header('Timeline');
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

$query = "SELECT * FROM timeline ORDER BY id ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$Outline->generateJS();

?>

<div class="container">
    <br />

