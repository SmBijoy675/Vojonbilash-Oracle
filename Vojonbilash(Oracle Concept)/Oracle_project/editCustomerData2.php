<?php  
 include 'adminDesign.php';
 $id=$_GET['id'];
 $error='';
 $name = $email = $username = $pass = $confirmpass = $gender = $number = $location= ''; 
 $txtname = $txtemail = $txtusername =$txtgender = $txtnumber = $txtlocation= ''; 
 $nameErr = $emailErr = $usernameErr = $passErr = $genderErr = $confirmpassErr = $numberErr = $locationErr = ''; 
 $conn = oci_connect('scott', 'tiger', 'localhost/XE');
 $user = $_SESSION['user'];
 $sql = "SELECT * FROM customerData where USERID='$id'";
 $stid = oci_parse($conn, $sql);
 oci_execute($stid);
 
 while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
     foreach ($row as $item) {
         $array[] = $item;    
     }
 }
 $name = $array[1];
 $email = $array[2];
 $username=$array[3];
 $gender = $array[5];
 $mobile = $array[6];
 $location = $array[7];

 if(isset($_POST["submit"]))  
 {  
     $txtname = $_POST['name'];
     $txtemail = $_POST['email'];
     $txtusername = $_POST['un'];
     $txtgender = $_POST['gender'];
     $txtnumber = $_POST['number'];
     $txtlocation = $_POST['location'];

     if(empty($_POST["name"]))  
     {  
          $nameErr = "Enter Name";  
     }
     else if (empty($_POST["email"])) {
          $emailErr = "Email is required";
     }
     else if(empty($_POST["un"]))  
     {  
          $usernameErr = "Enter a username";  
     }
     else if(empty($_POST["gender"]))  
     {  
          $genderErr = "Gender cannot be empty";  
     }
     else if(empty($_POST["number"]))  
     {  
          $numberErr = "Enter number";  
     }
     else if(empty($_POST["location"]))  
     {  
          $locationErr = "Enter location";  
     }
      
     else{
        $conn = oci_connect('scott', 'tiger', 'localhost/XE');
    
        $sql1 = oci_parse($conn,"UPDATE customerData SET NAME='$txtname', EMAIL='$txtemail', USERNAME='$txtusername',GENDER='$txtgender', MOBILE='$txtnumber', LOCATION='$txtlocation' WHERE USERID='$id'");
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
                    <legend>EDIT CUSTOMER DATA</legend> 
                     <label>Name</label>  
                     <input value="<?php echo $name ?>" type="text" name="name" class="form-control"  />
                     <span class="error">* <?php echo $nameErr;?></span> <br /> 

                     <label>E-mail</label>
                     <input value="<?php echo $email ?>" type="text" name = "email" class="form-control" />
                     <span class="error">* <?php echo $emailErr;?></span><br />

                     <label>User Name</label>
                     <input value="<?php echo $username ?>" type="text" name = "un" class="form-control" />
                     <span class="error">* <?php echo $usernameErr;?></span><br />


                     <label>Gender</label>
                     <input value="<?php echo $gender ?>" type="text" name = "gender" class="form-control" />
                     <span class="error">* <?php echo $genderErr;?></span><br />

                    <label>Mobile</label>  
                    <input value="<?php echo $mobile ?>" type="text" name="number" class="form-control" />
                    <span class="error">* <?php echo $numberErr;?></span><br />
                    
                    <label>Location</label>  
                    <input value="<?php echo $location ?>" type="text" name="location" class="form-control" />
                    <span class="error">* <?php echo $locationErr;?></span><br />
                    
                     
                    <input type="submit" name="submit" value="Submit"/>
                    <input type="submit" name="reset" value="Reset" /><br />           
                    </fieldset> 

               </form>  
          </div>  
          <br />  
     </body>  
</html>