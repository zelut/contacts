<?php
//
// Connects to local database
// (cedwards@zelut.org)
//

//
// Database Config Options
//
$dbuser     = "phpuser";    // user name
$dbname     = "contacts";   // database name
$dbserver   = "localhost";  // (localhost)
$dbpass     = "secret";     // user password

// Connect to DB
mysql_connect("$dbserver","$dbuser","$dbpass") or die(mysql_error());

// Select DB
mysql_select_db("$dbname") or die(mysql_error());

// This avoids SQL Injection in POST vars 
foreach ($_POST as $key => $value) { 
    $_POST[$key] = mysql_real_escape_string($value); 
} 

// This avoids SQL Injection in GET vars 
foreach ($_GET as $key => $value) { 
    $_GET[$key] = mysql_real_escape_string($value); 
} 

// Database Insert Function
function database_insert() {

    mysql_query("INSERT INTO contacts 
        (firstname, lastname, address, phone, email, notes, bday, username) VALUES
        ('{$_POST['firstname']}','{$_POST['lastname']}','{$_POST['address']}','{$_POST['phone']}','{$_POST['email']}','{$_POST['notes']}','{$_POST['bday']}','{$_SESSION['username']}')")
    or die(mysql_error());

    header("Location: index.php");
}


// Database Update Function
function database_update() {

    mysql_query("UPDATE contacts SET
        firstname='".$_POST['firstname']."',
        lastname='".$_POST['lastname']."',
        address='".$_POST['address']."',
        phone='".$_POST['phone']."',
        email='".$_POST['email']."',
        notes='".$_POST['notes']."',
        bday='".$_POST['bday']."',
        username='".$_SESSION['username']."'
        WHERE id='".$_POST['id']."' 
        AND username='".$_SESSION['username']."'")
    or die(mysql_error());

    header("Location: index.php");
}

// Query existing entries by id
function query_existing_entry() {

    $result = mysql_query("SELECT * FROM contacts WHERE id='{$_GET['id']}' AND username='{$_SESSION['username']}'")
        or die(mysql_error());

    $row = mysql_fetch_array($result);

    return $row;
}

// Delete existing entries by id
function delete_existing_entry() {

    mysql_query("DELETE FROM contacts WHERE id='{$_POST['id']}' AND username='{$_SESSION['username']}'")
        or die(mysql_error());

    header("Location: index.php");
}

function admin_manage_users() {

    if($_POST['username'] && $_POST['password']) {
        // check to see if user already exists
        // if so, update the existing entry
        // don't create a new one.
        $result = mysql_query("SELECT * FROM accounts WHERE username='{$_POST['username']}'")
            or die(mysql_error());
    
        $rowcount = mysql_num_rows($result);
    
        if ($rowcount == 1) {
            mysql_query("UPDATE accounts SET password=md5('{$_POST['password']}') WHERE username='{$_POST['username']}'")
            or die(mysql_error());
        } else {
            mysql_query("INSERT INTO accounts (username, password) VALUES ('{$_POST['username']}',md5('{$_POST['password']}'))")
                or die(mysql_error());
        }
    }
}


?>
