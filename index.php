<?php

require_once("db.inc.php");
require_once("header.inc.php");

    $result = mysql_query("SELECT * FROM contacts WHERE username='{$_SESSION['username']}' ORDER BY id")
        or die(mysql_error());

?>

<div id='content-wrap'>
<div id='content'>

<div class='featurebox'>

    <table class='table1'>

        <tr>
            <th align='left'>ID</th>
            <th align='left'>First Name</th>
            <th align='left'>Last Name</th>
            <th align='left'>Email</th>
            <th align='left'>Manage</th>
        </tr>

<?php

        while($index = mysql_fetch_array($result)) {

            echo "<tr>";
                 
                echo "<td align='left'><a href='edit.php?id=".$index['id']."'>".$index['id']."</a></td>";
                echo "<td align='left'>".$index['firstname']."</td>";
                echo "<td align='left'>".$index['lastname']."</td>";
                echo "<td align='left'><a href='mailto:".$index['email']."'>".$index['email']."</td>";
                 
                echo "<td align='left'>";
                 
                //echo "<form method='POST' action='edit.php?id={$index['id']}'>";
                //echo "<input type='Submit' name='{$index['id']}' value='Edit' class='f-name' tabindex='6' />";
                //echo "</form>";
                 
                //echo " ";
                //echo "<form method='POST' action='delete.php?id={$index['id']}'>";
                //echo "<input type='Submit' name='{$index['id']}' value='Delete' class='f-name' tabindex='7' />";
                //echo "</form>";
                 
                echo "</td>";
                 
            echo "</tr>";

        }
?>

    </table>

</div>

<?php 

require_once("footer.inc.php");

?>
