<?php  
 include 'adminDesign.php';
 $id=$_GET['id'];
 $error='';
 $name = $category = $mobile = $location= ''; 
 $nameErr = $catErr = $numErr = $locationErr = ''; 
 $conn = oci_connect('scott', 'tiger', 'localhost/XE');
 $user = $_SESSION['user'];
 $sql = "SELECT * FROM restaurantData where RESTAURANTID='$id'";
 $stid = oci_parse($conn, $sql);
 oci_execute($stid);
 
 while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
     foreach ($row as $item) {
         $array[] = $item;    
     }
 }
 $name = $array[1];
 $category = $array[2];
 $location=$array[3];
 $number = $array[4];

 if(isset($_POST["submit"]))  
 {  
     $txtname = $_POST['name'];
     $txtCategory = $_POST['category'];
     $txtnumber = $_POST['number'];
     $txtlocation = $_POST['location'];

    if(empty($_POST["name"]))  
     {  
          $nameErr = "Enter Name";  
     }
    else if (empty($_POST["category"])) {
          $catErr = "Category is required";
     }

    else if(empty($_POST["location"]))  
     {  
          $locationErr = "Enter location";  
     }
    else if(empty($_POST["number"]))  
     {  
          $numErr = "Enter Number";  
     }
    else{
        $conn = oci_connect('scott', 'tiger', 'localhost/XE');
    
        $sql1 = oci_parse($conn,"UPDATE restaurantData SET NAME='$txtname', CATEGORY='$txtCategory', LOCATION='$txtlocation', MOBILE='$txtnumber' WHERE RESTAURANTID='$id'");
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
                     <label>Name</label>  
                     <input value="<?php echo $name ?>" type="text" name="name" class="form-control"  />
                     <span class="error">* <?php echo $nameErr;?></span> <br /> 

                     <label>Category</label>
                     <input value="<?php echo $category ?>" type="text" name = "category" class="form-control" />
                     <span class="error">* <?php echo $catErr;?></span><br />

                    <label>Location</label>  
                    <input value="<?php echo $location ?>" type="text" name="location" class="form-control" />
                    <span class="error">* <?php echo $locationErr;?></span><br />

                     <label>Mobile</label>
                     <input value="<?php echo $number ?>" type="text" name = "number" class="form-control" />
                     <span class="error">* <?php echo $numErr;?></span><br />
                    

                    
                     
                    <input type="submit" name="submit" value="Submit"/>
                    <input type="submit" name="reset" value="Reset" /><br />           
                    </fieldset> 

               </form>  
          </div>  
          <br />  
     </body>  
</html>