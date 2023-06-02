<?php  
 include 'adminDesign.php';

 $error='';
 $name = $category = $mobile = $location= ''; 
 $nameErr = $priceErr = $rnameErr = $ridErr = $locationErr=''; 
 if(isset($_POST["submit"]))  
 {  
     $name = $_POST['name'];
     $price = $_POST['price'];
     $rname = $_POST['rname'];
     $rid = $_POST['rid'];
     $location = $_POST['location'];

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
    
        $sql = oci_parse($conn,"INSERT INTO foodDetail (NAME, PRICE, RESTAURANTNAME,RESTAURANTID, LOCATION) 
                VALUES ('{$name}', '{$price}','{$rname}','{$rid}','{$location}' )");
        $result = oci_execute($sql);
        if ($result) {
                    header("location:insertionSuccess.php");
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
     .error 
     {
          color: #FF0000;
     }
     .heading
     {
           color: coral;
     }
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
                    <legend class="heading">EDIT RESTAURANT DATA</legend> 
                     <label>Food Name</label>  
                     <input type="text" name="name" class="form-control"  />
                     <span class="error">* <?php echo $nameErr;?></span> <br /> 

                     <label>Price</label>
                     <input type="text" name = "price" class="form-control" />
                     <span class="error">* <?php echo $priceErr;?></span><br />

                    <label>Restaurant Name</label>  
                    <input type="text" name="rname" class="form-control" />
                    <span class="error">* <?php echo $rnameErr;?></span><br />

                     <label>Restaurant ID</label>
                     <input type="text" name = "rid" class="form-control" />
                     <span class="error">* <?php echo $ridErr;?></span><br />
                    
                     <label>Location</label>
                     <input type="text" name = "location" class="form-control" />
                     <span class="error">* <?php echo $locationErr;?></span><br />

                    
                     
                    <input type="submit" name="submit" value="Submit"/>
                    <input type="submit" name="reset" value="Reset" /><br />           
                    </fieldset>  

               </form>  
          </div>  
          <br />  
     </body>  
</html>