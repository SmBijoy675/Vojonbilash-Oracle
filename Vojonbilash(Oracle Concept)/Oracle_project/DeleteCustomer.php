<?php  
 include 'adminDesign.php';

 $error='';
 $username = ''; 
 $unameErr = ''; 
 if(isset($_POST["submit"]))  
 {  
     $username = $_POST['uname'];

     if(empty($_POST["uname"]))  
     {  
          $unameErr="Enter USERNAME";  
     }   
     else{
        $conn = oci_connect('scott', 'tiger', 'localhost/XE');
    
        $sql = oci_parse($conn,"DELETE FROM customerData WHERE username='{$username}'");
        $result = oci_execute($sql);
        if ($result) 
        {
                    header("location:DeletionSuccess.php");
                    exit();
        }
        else{
            echo "Error !";
                    exit();
        }
     }
}   

 ?>  


<html>
<head>
           <title>VojonBilash</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head> 
      <style>
     .error {color: #FF0000;}
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
    .heading
     {
        color: coral;
     }
     </style> 
      <body> 
      <center>
        <?php
                    $conn = oci_connect('scott', 'tiger', 'localhost/XE');
                    $sql = "SELECT * FROM customerData ";
                        
                    $stid = oci_parse($conn, $sql);
                    oci_execute($stid);
                    echo"<table>
                    <tr>
                    <th>Cusromer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Location</th>
                    
                    </tr>";
                    while($row = oci_fetch_assoc($stid))
                    {
                        echo"<tr>";
                        echo "<td>" . $row["USERID"] . "</td>";
                        echo "<td>" . $row["NAME"] . "</td>";
                        echo "<td>" . $row["EMAIL"] . "</td>";
                        echo "<td>" . $row["USERNAME"] . "</td>";
                        echo "<td>" . $row["GENDER"] . "</td>";
                        echo "<td>" . $row["MOBILE"] . "</td>";
                        echo "<td>" . $row["LOCATION"] . "</td>";
                        echo"<tr>";
                    }
        ?>
        </center>
      

           <br><br><br><br><br> 
           <div class="container" style="width:500px;">  
                                
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br> 
                     <fieldset>
                    <legend class="heading">INSERT USERNAME FOR DELETION</legend> 
                     <label>Insert USERNAME</label>  
                     <input type="text" name="uname" class="form-control" />
                     <span class="error">* <?php echo $unameErr;?></span> <br />  
                     <input type="submit" name="submit" value="Submit"/>         
                    </fieldset> 
               </form>  
          </div>  
          <br />  
     </body>  
</html>