<?php
session_start();

require_once("db.inc.php");

$query = "SELECT * FROM $acctable WHERE username='".$_POST['username']."' AND password='".md5($_POST['password'])."'";

$result = mysql_query($query)
    or die(mysql_error());

$rowcount = mysql_num_rows($result);

if ($rowcount == 1) {
    $_SESSION['username'] = $_POST['username'];
    header("Location: index.php");
} else {
    header("Location: login.php");
}
?>
