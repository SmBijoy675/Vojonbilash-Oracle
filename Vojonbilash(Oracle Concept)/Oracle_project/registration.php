<?php  
 include 'headerfooter.php';

 $error='';
 $name = $email = $username = $pass = $confirmpass = $gender = $number = $location= ''; 
 $nameErr = $emailErr = $usernameErr = $passErr = $genderErr = $confirmpassErr = $numberErr = $locationErr = ''; 
 if(isset($_POST["submit"]))  
 {  
     $name = $_POST['name'];
     $email = $_POST['email'];
     $username = $_POST['un'];
     $pass = $_POST['pass'];
     $gender = $_POST['gender'];
     $number = $_POST['number'];
     $location = $_POST['location'];

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
     else if(empty($_POST["pass"]))  
     {  
          $passErr = "Enter a password";  
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
          $numberErr = "Enter location";  
     }
      
     else{
        $conn = oci_connect('scott', 'tiger', 'localhost/XE');
    
        $sql = oci_parse($conn,"INSERT INTO customerData (NAME, EMAIL, USERNAME, PASSWORD, GENDER, MOBILE, LOCATION) 
                VALUES ('{$name}', '{$email}', '{$username}', '{$pass}', '{$gender}', '{$number}', '{$location}')");
        $result = oci_execute($sql);
        if ($result) {
                    header("location: registrationSuccess.php");
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
                    <legend>REGISTRATION</legend> 
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" />
                     <span class="error">* <?php echo $nameErr;?></span> <br /> 

                     <label>E-mail</label>
                     <input type="text" name = "email" class="form-control" />
                     <span class="error">* <?php echo $emailErr;?></span><br />

                     <label>User Name</label>
                     <input type="text" name = "un" class="form-control" />
                     <span class="error">* <?php echo $usernameErr;?></span><br />

                     <label>Password</label>
                     <input type="password" name = "pass" class="form-control" />
                     <span class="error">* <?php echo $passErr;?></span><br />

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>                     
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                    <span class="error">* <?php echo $genderErr;?></span><br /><br />
                    </fieldset> 

                    <label>Mobile</label>  
                    <input type="text" name="number" class="form-control" />
                    <span class="error">* <?php echo $numberErr;?></span><br />
                    
                    <label>Location</label>  
                    <input type="text" name="location" class="form-control" />
                    <span class="error">* <?php echo $locationErr;?></span><br />
                    
                     
                    <input type="submit" name="submit" value="Submit"/>
                    <input type="submit" name="reset" value="Reset" /><br />           
                    </fieldset> 

               </form>  
          </div>  
          <br />  
     </body>  
</html>