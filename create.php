<?php

require_once("db.inc.php");
require_once("header.inc.php");

if (isset($_POST['submit']) AND ctype_alpha($_POST['firstname']) AND ctype_alpha($_POST['lastname'])) {
    database_insert();
    
//    print "Database has been updated.";
}

?>

<form method='POST' action='<?php $PHP_SELF ?>' class='f-wrap-1'>

    <fieldset>

        <h3>Create a new entry in the database:</h3>
    
        <input id='id' type='hidden' name='id' value='<?php echo $row['id']?>'>

        <label for="firstname">
        <b>First Name:</b>
            <input id="firstname" type="text" name="firstname" size="35" class="f-name" tabindex="1" /><br />
        </label>

        <label for="lastname">
        <b>Last Name:</b>
            <input id="lastname" type="text" name="lastname" size="35" class="f-name" tabindex="2" /><br />
        </label>

        <label for="address">
        <b>Address:</b>
            <textarea id="address" name="address" rows="5" cols="35" class="f-name" tabindex="3" /></textarea><br />
        </label>

        <label for="phone">
        <b>Phone:</b>
            <input id="phone" type="text" name="phone" size="12" class="f-name" tabindex="4" /><br />
        </label>

        <label for="email">
        <b>Email:</b>
            <input id="email" type="text" name="email" size="35" class="f-name" tabindex="5" /><br />
        </label>

        <label for="bday">
        <b>Birthday:</b>
            <input id="bday" type="text" name="bday" size="8" class="f-name" tabindex="6" /><br />
        </label>

        <label for="notes">
        <b>Notes:</b>
            <textarea id="notes" name="notes" rows="5" cols="35" class="f-name" tabindex="7" /></textarea><br />
        </label>

        <div class="f-submit-wrap">
        <input type="Submit" name="submit" value="Update Information" class="f-submit" tabindex="8" /><br />
        </div>
    
    </fieldset>

</form>

<?php
require_once('footer.inc.php');
?>
