<?php

require_once("db.inc.php");
require_once("header.inc.php");

//if ($_SESSION['username'] != 'admin') {
//    header("Location: index.php");
//}

?>

<form method='POST' action='<?php $PHP_SELF ?>' class='f-wrap-1'>

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
        <input type='submit' name='admin' value='Submit' class='f-submit' tabindex='3' />
        </div>

        </fieldset>
</form>

<?php

if (isset($_POST['admin'])) {
    admin_manage_users();
}
require_once("footer.inc.php");
?>
