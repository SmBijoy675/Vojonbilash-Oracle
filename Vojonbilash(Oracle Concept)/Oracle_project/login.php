<?php
include "headerfooter.php";

$nameErr = $passErr = "";
$adname='admin';
$adpass='admin';
$name = $_POST['name'];
$pass = $_POST['pass'];
$conn = oci_connect('scott', 'tiger', 'localhost/XE');
if(isset($_POST["login"]))
{

    if(empty($_POST["name"])){
        $nameErr = "<label class='text-danger'>Enter username</label>";
    }
    else if(empty($_POST["pass"])){
        $passErr = "<label class='text-danger'>Enter password</label>";
    }
    else
    {
        if($adname==$name && $adpass==$pass)
        {
            
            header("location:adminDashboard.php");

        }
        else
        {

            

            $sql = "SELECT * FROM customerData where USERNAME ='{$name}' and PASSWORD ='{$pass}'";
            
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);
        
        
            while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) 
            {
        
                foreach ($row as $item) 
                {
                    header("location:homepage.php");
                }

            }
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
<body>  
    
    <br />  
    <div class="container" style="width: 500px; height: 10%;"> 
    <br><br><br><br><br><br><br><br>
    <form action="" method="post">
        <fieldset>
        <legend>LOGIN</legend>
        <label>User Name :</label>
        <input type = "text" name = "name" class="form-control" value="<?php if(isset($_COOKIE['name'])) {echo $_COOKIE['name'];} ?>">
        <span class="error">* <?php echo $nameErr;?></span> <br />

        <label>Password  :</label>
        <input type = "password" name = "pass" class="form-control" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>">
        <span class="error">* <?php echo $passErr;?></span> <br />

        <hr>
        <input type = "checkbox" name = "remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>>Remember Me<br><br>
        <input type = "submit" name = "login" value = "Login">

        <?php
            if(isset($message)){
                echo $message;
            }

            if (!empty($_POST['remember'])) {
                setcookie("name", $_POST['name'], time()+100);
                setcookie("pass", $_POST['pass'], time()+100);                
            }else{
                setcookie("name", "");
                setcookie("pass", "");
            }
        ?>
    </form>
</body>
</html>