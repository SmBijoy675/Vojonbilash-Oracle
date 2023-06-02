<?php  
 include 'adminDesign.php';
 $id=$_GET['id'];
 $error='';
 $name = $price = $rname = $rid= $location= ''; 
 $txtname = $txtprice = $txtrname =$txtrid = $txtlocation= ''; 
 $nameErr = $priceErr = $rnameErr = $ridErr = $locationErr=''; 
 $conn = oci_connect('scott', 'tiger', 'localhost/XE');
 $user = $_SESSION['user'];
 $sql = "SELECT * FROM foodDetail where FOODID='$id'";
 $stid = oci_parse($conn, $sql);
 oci_execute($stid);
 
 while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
     foreach ($row as $item) {
         $array[] = $item;    
     }
 }
 $name = $array[1];
 $price = $array[2];
 $rname=$array[3];
 $rid = $array[4];
 $location = $array[5];
 if(isset($_POST["submit"]))  
 {  
    $txtname=$_POST['name'];
    $txtprice=$_POST['price'];
    $txtrname=$_POST['rname'];
    $txtrid=$_POST['rid'];
    $txtlocation=$_POST['location'];

    if(empty($_POST["name"]))  
     {  
          $nameErr = "Enter Name";  
     }
    else if (empty($_POST["price"])) {
          $priceErr = "Price is required";
     }

    else if(empty($_POST["location"]))  
     {  
          $locationErr = "Enter location";  
     }
    else if(empty($_POST["rname"]))  
     {  
          $rnameErr = "Restaurant Name Required";  
     }
     else if(empty($_POST["rid"]))  
     {  
          $ridErr = "Restaurant ID Required";  
     }
    else{
        $conn = oci_connect('scott', 'tiger', 'localhost/XE');
    
        $sql1 = oci_parse($conn,"UPDATE foodDetail SET NAME='$txtname', PRICE='$txtprice', RESTAURANTNAME='$txtrname', RESTAURANTID='$txtrid',LOCATION='$txtlocation' WHERE FOODID='$id'");
        $result = oci_execute($sql1);
        if ($result) {
                    header("location: editSuccess.php");
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
     </style> 
      <body>  
           <br><br><br><br><br>  
           <div class="container" style="width:500px;">  
                                
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br /> 
                     <fieldset>
                    <legend>EDIT RESTAURANT DATA</legend> 
                     <label>Name</label>  
                     <input value="<?php echo $name ?>" type="text" name="name" class="form-control"  />
                     <span class="error">* <?php echo $nameErr;?></span> <br /> 

                     <label>Price</label>
                     <input value="<?php echo $price?>" type="text" name = "price" class="form-control" />
                     <span class="error">* <?php echo $priceErr;?></span><br />

                    <label>Restaurant Name</label>  
                    <input value="<?php echo $rname ?>" type="text" name="rname" class="form-control" />
                    <span class="error">* <?php echo $rnameErr;?></span><br />

                     <label>Restaurant ID</label>
                     <input value="<?php echo $rid ?>" type="text" name = "rid" class="form-control" />
                     <span class="error">* <?php echo $ridErr;?></span><br />
                    
                     <label>Location</label>
                     <input value="<?php echo $location ?>" type="text" name = "location" class="form-control" />
                     <span class="error">* <?php echo $locationErr;?></span><br />

                    
                     
                    <input type="submit" name="submit" value="Submit"/>
                    <input type="submit" name="reset" value="Reset" /><br />           
                    </fieldset> 

               </form>  
          </div>  
          <br />  
     </body>  
</html>