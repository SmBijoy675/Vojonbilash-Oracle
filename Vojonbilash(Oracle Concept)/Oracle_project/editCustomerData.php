<?php  
 include 'adminDesign.php';

 $error='';
 $ID = ''; 
 $unameErr = ''; 
 if(isset($_POST["submit"]))  
 {  
     $ID = $_POST['id'];

     if(empty($_POST["id"]))  
     {  
          $unameErr="Enter USER ID";  
     }   
     else{
          header("location:editCustomerData2.php?id=$ID");
          exit();
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
                                
                <form method="post" >  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br> 
                     <fieldset>
                    <legend class="heading">INSERT ID TO EDIT CUSTOMER DATA</legend> 
                     <label>Insert ID</label>  
                     <input type="text" name="id" class="form-control" />
                     <span class="error">* <?php echo $unameErr;?></span> <br />  
                     <input type="submit" name="submit" value="Submit"/>         
                    </fieldset> 
               </form>  
          </div>  
          <br />  
     </body>  
</html>