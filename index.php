<?php

require_once("db.inc.php");
require_once("header.inc.php");

    $query = "SELECT * FROM $dbtable WHERE username='".$_SESSION['username']."' ORDER BY id";

    $result = mysql_query($query)
        or die(mysql_error());

echo "<div class='featurebox'>";

    echo "<table class='table1'>";

        echo "<tr>";

            echo "<th align='left'>First Name</th>";
            echo "<th align='left'>Last Name</th>";
            echo "<th align='left'>Email</th>";
            echo "<th align='left'>Manage</th>";

        echo "</tr>";

        while($row = mysql_fetch_array($result)) {

            echo "<tr>";
    
                echo "<td align='left'>".$row['firstname']."</td>";
                echo "<td align='left'>".$row['lastname']."</td>";
                echo "<td align='left'><a href='mailto:".$row['email']."'>".$row['email']."</td>";
    
                echo "<td align='left'>";
    
                echo "<form method='POST' action='edit.php?id=".$row['id']."'>";
                echo "<input type='Submit' name='".$row['id']."' value='Edit' class='f-name' tabindex='6' />";
                echo "</form>";
    
                echo " ";
                echo "<form method='POST' action='delete.php?id=".$row['id']."'>";
                echo "<input type='Submit' name='".$row['id']."' value='Delete' class='f-name' tabindex='7' />";
                echo "</form>";
    
                echo "</td>";
    
            echo "</tr>";

        }

    echo "</table>";

echo "</div>";

require_once("footer.inc.php");

?>
