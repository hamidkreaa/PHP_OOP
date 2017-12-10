<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "edv_schule";
	
	$optionen = array(
        PDO::ATTR_PERSISTENT               => true,
        PDO::ATTR_ERRMODE                  => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE       => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
    );
	
	$db = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password, $optionen);
	
	$db->query('SET NAMES utf8');


?>