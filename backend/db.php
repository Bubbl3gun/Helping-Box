<?php

// Datenbankverbindungen

$dbname = "db242539x2492164";
$dbpw = "jugendhackt";
$dburl = "mysql.webhosting61.1blu.de";
$dbuser = "s242539_2492164";

// Aufbau der Verbindung (OnError => Dirty Error Message)
$con = mysql_connect($dburl, $dbuser, $dbpw) or die(mysql_error());
mysqli_set_charset($con, 'utf8');
mysql_select_db($dbname, $con) or die(mysql_error());
