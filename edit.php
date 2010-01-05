<?php

require_once("db.inc.php");
require_once("header.inc.php");

    if(isset($_POST['update'])) {
        $query = "UPDATE $dbtable SET
        firstname='".$_POST['firstname']."',lastname='".$_POST['lastname']."',address='".$_POST['address']."',phone='".$_POST['phone']."',email='".$_POST['email']."',notes='".$_POST['notes']."',bday='".$_POST['bday']."',username='".$_SESSION['username']."'
        WHERE id='".$_POST['id']."' AND username='".$_SESSION['username']."'";

        $result = mysql_query($query)
            or die(mysql_error());

        header("Location: index.php");

    }

    $query = "SELECT * FROM $dbtable WHERE id='".$_GET['id']."' AND username='".$_SESSION['username']."'";

    $result = mysql_query($query)
        or die(mysql_error());

    $row = mysql_fetch_array($result);

?>

<form method="POST" action="<?php echo $PHP_SELF?>" class='f-wrap-1'>

    <fieldset>

    <h3>Edit an entry in the database:</h3>

        <input type="hidden" name="id" value="<?php echo $row['id']?>">

        <label for='firstname'>
        <b>First Name:</b>
            <input type="Text" name="firstname" size="35" class='f-name' tabindex=1 value="<?php echo $row['firstname']?>" /><br />
        </label>

        <label for='lastname'>
        <b>Last Name:</b>
            <input type="Text" name="lastname" size="35" class='f-name' tabindex=2 value="<?php echo $row['lastname']?>" /><br />
        </label>

        <label for='address'>
        <b>Address:</b>
            <textarea name="address" rows="5" cols="35" class='f-name' tabindex=3 /><?php echo $row['address']?></textarea><br />
        </label>

        <label for='phone'>
        <b>Phone:</b>
            <input type="Text" name="phone" size="12" class='f-name' tabindex=4 value="<?php echo $row['phone']?>" /><br />
        </label>

        <label for='email'>
        <b>Email:</b>
            <input type="Text" name="email" size="35" class='f-email' tabindex=5 value="<?php echo $row['email']?>" /><br />
        </label>

        <label for='bday'>
        <b>Birthday:</b>
            <input type="Text" name="bday" size="8" class='f-name' tabindex=6 value="<?php echo $row['bday']?>" /><br />
        </label>

        <label for='notes'>
        <b>Notes:</b>
            <textarea name="notes" rows="5" cols="35" class='f-name' tabindex=7 /><?php echo $row['notes']?></textarea><br />
        </label>

        <div class='f-submit-wrap'>
        <input type="Submit" name="update" value="Update Information">
        </div>

        </fieldset>
</form>
<?php
require_once("footer.inc.php");
?>
