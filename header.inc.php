<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
Copyright: Daemon Pty Limited 2006, http://www.daemon.com.au
Community: Mollio http://www.mollio.org $
License: Released Under the "Common Public License 1.0", 
http://www.opensource.org/licenses/cpl.php
License: Released Under the "Creative Commons License", 
http://creativecommons.org/licenses/by/2.5/
License: Released Under the "GNU Creative Commons License", 
http://creativecommons.org/licenses/GPL/2.0/
-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contacts</title>
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/ie6_or_less.css" />
<![endif]-->
<!--<script type="text/javascript" src="js/common.js"></script>-->
</head>
<body id="type-a">
<div id="wrap">

    <div id="header">
        <div id="site-name">Contacts</div>
        <ul id="nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="create.php">New Entry</a></li>
<?php
//    if ($_SESSION['username'] == 'admin') {
        echo "<li><a href='admin.php'>Admin</a></li>";
//    }
?>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
