<?php
include "adminDesign.php";
?>

<html>
<head>

        <title>VojonBilash</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    </head>
    <style>
	table,th,td
	{
		border: 5px solid black;
  		border-collapse: collapse;
        border-radius: 7px;
        border-color: #96D4D4;
        width:50%;
	}
    th,td
    {
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .header
    {
        color: blue;
    }
    </style>
    <body>
        <br><br><br><br>
        <center>
        <legend class="header"><h1><b>FOOD MENU</b></h1></legend>
        <br><br><br>
        <?php
        $conn = oci_connect('scott', 'tiger', 'localhost/XE');
        $sql = "SELECT * FROM foodDetail ";
            
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
        echo"<table>
        <tr>
        <th>Food ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Restaurant Name</th>
        <th>Restaurant ID</th>
        <th>Location</th>
        </tr>";
        while($row = oci_fetch_assoc($stid))
        {
            echo"<tr>";
            echo "<td>" . $row["FOODID"] . "</td>";
            echo "<td>" . $row["NAME"] . "</td>";
            echo "<td>" . $row["PRICE"] . "</td>";
            echo "<td>" . $row["RESTAURANTNAME"] . "</td>";
            echo "<td>" . $row["RESTAURANTID"] . "</td>";
            echo "<td>" . $row["LOCATION"] . "</td>";
            echo"<tr>";
        }
        ?>
       
        </center>
    </body>
</html>