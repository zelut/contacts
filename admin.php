<?php

require_once("db.inc.php");
require_once("header.inc.php");

if ($_SESSION['username'] != 'admin') {
    header("Location: index.php");
}

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($username && $password) {
        // check to see if user already exists
        // if so, update the existing entry
        // don't create a new one.
        $query = "SELECT * FROM accounts WHERE username='{$_POST['username']}'";
        $result = mysql_query($query)
            or die(mysql_error());

        $rowcount = mysql_num_rows($result);
        if ($rowcount == 1) {
            $query = "UPDATE $acctable SET
            password=md5('{$_POST['password']}')
            WHERE username='{$_POST['username']}'";

            $result = mysql_query($query)
                or die(mysql_error());
        } else {

            $query = "INSERT INTO accounts (username, password) VALUES ('{$_POST['username']}',md5('{$_POST['password']}'))";
            $result = mysql_query($query)
                or die(mysql_error());
        }
    }

?>
<form method="POST" action="admin.php" class='f-wrap-1'>

    <fieldset>

    <h3>Create new login credentials for this site here:</h3>

        <label for='username'>
        <b>username:</b> 
            <input id='username' type='text' name='username' size='20' class='f-name' tabindex='1' /><br />
        </label>

        <label for='password'>
        <b>password:</b>
            <input id='password' type='password' name='password' size='20' class='f-name' tabindex='2' /><br />
        </label>

        <div class='f-submit-wrap'>
        <input type='submit' value='Submit' class='f-submit' tabindex='3' />
        </div>

        </fieldset>
</form>
<?php
require_once("footer.inc.php");
?>
