<?php

require_once("db.inc.php");
require_once("header.inc.php");

$row = query_existing_entry();

?>


<form method="post" action="<?php echo $PHP_SELF?>" class='f-wrap-1'>

    <fieldset>

    <h3>Are you sure you want to delete this entry:</h3>

        <input type="hidden" name="id" value="<?php echo $row['id']?>">

        <label for='firstname'>
        <b>First Name:</b>
            <input type="Text" name="firstname" size="35" class='f-name' tabindex=1 value="<?php echo $row['firstname']?>" readonly /><br />
        </label>

        <label for='lastname'>
        <b>Last Name:</b>
            <input type="Text" name="lastname" size="35" class='f-name' tabindex=2 value="<?php echo $row['lastname']?>" readonly /><br />
        </label>

        <label for='address'>
        <b>Address:</b>
            <textarea name="address" rows="5" cols="35" class='f-name' tabindex=3 readonly /><?php echo $row['address']?></textarea><br />
        </label>

        <label for='phone'>
        <b>Phone:</b>
            <input type="Text" name="phone" size="12" class='f-name' tabindex=4 value="<?php echo $row['phone']?>" readonly /><br />
        </label>

        <label for='email'>
        <b>Email:</b>
            <input type="Text" name="email" size="35" class='f-email' tabindex=5 value="<?php echo $row['email']?>" readonly /><br />
        </label>

        <label for='bday'>
        <b>Birthday:</b>
            <input type="Text" name="bday" size="8" class='f-name' tabindex=6 value="<?php echo $row['bday']?>" readonly /><br />
        </label>

        <label for='notes'>
        <b>Notes:</b>
            <textarea name="notes" rows="5" cols="35" class='f-name' tabindex=7 readonly /><?php echo $row['notes']?></textarea><br />
        </label>

        <div class='f-submit-wrap'>
        <input type="Submit" name="delete" value="Delete">
        </div>

        </fieldset>
</form>

<?php

if (isset($_POST['delete'])) {
    delete_existing_entry();
}

require_once("footer.inc.php");
?>
