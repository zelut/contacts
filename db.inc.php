<?php
//
// Connects to local database
// (cedwards@zelut.org)
//

//
// Database Config Options
//
$dbuser     = "username";   // user name
$dbname     = "database";   // database name
$dbserver   = "localhost";  // (localhost)
$dbpass     = "password";   // user password
$dbtable    = "contacts";   // database table
$acctable   = "accounts";   // accounts table

// Connect to DB
mysql_connect("$dbserver","$dbuser","$dbpass")
    or die(mysql_error());

// Select DB
mysql_select_db("$dbname")
    or die(mysql_error());

// This avoids SQL Injection in POST vars 
foreach ($_POST as $key => $value) { 
  $_POST[$key] = mysql_real_escape_string($value); 
} 

// This avoids SQL Injection in GET vars 
foreach ($_GET as $key => $value) { 
  $_GET[$key] = mysql_real_escape_string($value); 
} 

?>
