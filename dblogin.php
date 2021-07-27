<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php
    

    ?>

	<?php
	$username = $password = "";
	$usernameErr =  $passwordErr = "";

     if ($_SERVER["REQUEST_METHOD"] == "POST")
       {
         if (empty($_POST['username'])) 
         {
            $usernameErr = "Username required";
         }
         else
         {
            $username = $_POST['username'];
         }

         if (empty($_POST['password'])) 
         {
            $passwordErr = "password required";
         }
         else
         {
            $password = $_POST['password'];
         }

         if ($usernameErr == "" || $passwordErr == "") 
         {
            require_once 'db1.php';
            
            $sql = "SELECT * FROM login WHERE userName = '$username' AND userEmail = '$password";

            $stmt = mysqli_query($conn,$sql);

            $num = mysqli_num_rows($stmt);

            if ($num ==1) 
            {
               header("location: home.php");
            }
            


             
         }
       } 

	?>

	 <div class="signin-input">
     <form method="POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> ">
     	
        

     	<label for="username">Username</label>
     	<br>
     	<input type="text" id="username" name="username" placeholder="Enter your username" value="<?php echo $username ?>">
     	<br>
        <?php echo $usernameErr ?>
        <br>
     	<label for="password">Password</label>
     	<br>
     	<input type="password" id="password" name="password" placeholder="Enter Your Password" value="<?php echo $password ?>">
        <br>
        <?php echo $passwordErr ?>
     	<br><br>
     	
     	<div class="login-button">

         <input type="submit" id="login" name="login" value="Login">

        </div>
        
       </div>

</body>
</html>