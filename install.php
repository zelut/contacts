<?php

require_once("db.inc.php");
    
    // Create the contacts table
    mysql_query("CREATE TABLE contacts (
        id INT NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        address TEXT,
        phone VARCHAR(11),
        email TEXT,
        notes TEXT,
        bday INT,
        username VARCHAR(12))")
        or die(mysql_error());

    // Create the accounts table
    mysql_query("CREATE TABLE accounts (
        username VARCHAR(12) NOT NULL,
        password VARCHAR(32) NOT NULL)")
        or die(mysql_error());

    echo "Tables Created!<br />";

    // Populate generic data
    mysql_query("INSERT INTO contacts 
        (firstname, lastname, phone, email, username) 
        VALUES('John','Doe','15555555555','john.doe@example.com','admin')")
        or die(mysql_error());
    
    mysql_query("INSERT INTO contacts
        (firstname, lastname, phone, email, username) 
        VALUES('Jane','Doe','15555555555','jane.doe@example.com','admin')")
        or die(mysql_error());

    // Populate default login credentials
    mysql_query("INSERT INTO accounts
        (username, password)
        VALUES('admin',md5('password'))")
        or die(mysql_error());

    echo "Default Data Inserted<br />";

    // Display default data
    $query = "SELECT * FROM contacts";

    $result = mysql_query($query)
        or die(mysql_error());

    echo "<center>";
    echo "<h1>Contacts</h1>";
    echo "<table cellpadding=2 cellspacing=1 border=0>";
    echo "<tr> <th>First Name</th> <th>Last Name</th> <th>Address</th> <th>Phone</th> <th>Email</th> <th>Notes</th> </tr>";

    while($row = mysql_fetch_array($result)) {
        echo "<tr bgcolor=a9bfd2>";
        echo "<td>";
        echo $row['firstname'];
        echo "</td><td>";
        echo $row['lastname'];
        echo "</td><td>";
        echo $row['address'];
        echo "</td><td>";
        echo $row['phone'];
        echo "</td><td>";
        echo $row['email'];
        echo "</td><td>";
        echo $row['notes'];
        echo "</td><td>";
        echo $row['bday'];
        echo "</td></tr>";
    }
    echo "</table>";
    echo "</center>";

?>
