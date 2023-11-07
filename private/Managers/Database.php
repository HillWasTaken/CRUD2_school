<?php

$con = new PDO("mysql:host=localhost;dbname=CRUD; charset=utf8", "root", "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

global $con;
?>