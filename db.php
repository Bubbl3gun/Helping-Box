<?php

// Datenbankverbindungen

$dbname = "";
$dbpw = "";
$dburl = "";
$dbuser = "";

// Aufbau der Verbindung (OnError => Dirty Error Message)
$con= mysql_connect($dburl, $dbuser, $dbpw) or die(mysql_error());
mysqli_set_charset($con, 'utf8');
mysql_select_db($dbname, $con) or die(mysql_error());
