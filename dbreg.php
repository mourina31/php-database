<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php
	    $firstname = $lastname = $emailaddress =$gender =$address = $peraddress = $phone =$username = $password = $confirmpassword = ""; 
	        $firstnameErr = $lastnameErr = $emailaddressErr =  $genderErr =$addressErr =
	        $peraddressErr = $phoneErr = $usernameErr = $passwordErr = $confirmpasswordErr = "";

	   
	     

	   if ($_SERVER["REQUEST_METHOD"] == "POST")
	   
        {
         	if (empty($_POST['fname'])) 
         	{
         		$firstnameErr = "Enter your first name";
         	}
         	else
         	{
         		$firstname = $_POST['fname'];
         	}

         	if (empty($_POST['lname'])) 
         	{
         		$lastnameErr = "Enter your last name";
         	}
         	else
         	{
         		$lastname = $_POST['lname'];
         	}

	   	    if (empty($_POST['email'])) 
	   	    {
	   	 	$emailErr = "Email required";
	   	    }
	   	 else
	   	 {
	   	 	$email = $_POST['email'];
	   	 }
	   	 if (empty($_POST['gender']))
             {
            	$genderErr = "Select your gender";
            }
            else
            {
            	$gender = $_POST['gender'];
            }

           if (empty($_POST['address']))
            {
            	$addressErr = "Enter your present address";
            }
            else
            {
            	$address = $_POST['address'];
            }
             if (empty($_POST['peraddress']))
            {
            	$peraddressErr = "Enter your permanent address";
            }
            else
            {
            	$address = $_POST['peraddress'];
            }
             if (empty($_POST['phone']))
            {
            	$phoneErr = "Enter your phone number";
            }
            else
            {
            	$phone = $_POST['phone'];
            }

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
	   	 	$passwordErr = "Password required";
	   	 }
	   	 else
	   	 {
	   	 	$password = $_POST['password'];
	   	 }

	   	 if (empty($_POST['confirmpassword'])) 
	   	 {
	   	 	$confirmpasswordErr = "Confirm Password";
	   	 }
	   	 else
	   	 {
	   	 	$comfirmpassword = $_POST['confirmpassword'];
	   	 }


	   	 if ($emailErr == "" && $usernameErr == "" && $passwordErr == "" && $confirmpasswordErr == "") 
	   	 {
	   	 	require_once 'db1.php';


	   	 
	   	 	$sql = "SELECT * FROM login WHERE userName = '$username' AND userEmail = '$email";
	   	 	$stmt = mysqli_query($conn,$sql);

	   	 	$num = mysqli_num_rows($stmt);

	   	 	if ($num == 1) 
	   	 	{
	   	 		echo "Username or Email Already exit";
	   	 	}

	   	 	else
	   	 	{
	   	 		if ($password !== $confirmpassword) 
	   	 		{
	   	 			echo "password not matched";
	   	 		}
	   	 		else

	   	 		{
	   	 			$register = "INSERT INTO login(userName, userEmail, userPassword)  VALUES ($username,$email,$password)";
	   	 			mysqli_query($conn,$register);
	   	 			echo "Registration success";
	   	 			header("location: dblogin.php");

	   	 		}
	   	 	} 	 	
	   	 	
	   	 }


	   }


	?>

	<div class="signup-input">
		<h1>Registration</h1>

     	 <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
         <fieldset>
         	<legend align=center><h1>Basic Information</h1></legend>
      	     <label for="firstname">First Name</label>
      	     <input type="text" id="firstname" name="fname" value="<?php echo $firstname ?>">
      	     <br>
      	     <?php echo $firstnameErr; ?>
      	     <br><br>
      	      <label for="lastname">Last Name</label>
      	     <input type="text" id="lastname" name="lname" value="<?php echo $lastname ?>">
      	     <br>
      	     <?php echo $lastnameErr; ?>
      	     <br><br>
      	     <label for="email">Email</label>
      	     <input type="email" id="email" name="email" value="<?php echo $emailaddress ?>">
      	     <br>
      	     <?php echo $emailaddressErr; ?>
      	     <br><br>
      	     <label for="gender">Gender:</label>
      	     <br>
      	     <label for="male">Male</label>
      	     <input type="radio" id="male" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value ="male" >
             <label for="female">Female</label>
             <input type="radio" id="female" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value = "female" >
             <label for="other">Other</label>
             <input type="radio" id="other" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value ="other" >
             <br>
             <?php echo $genderErr; ?>
             <br><br>

            </fieldset>

            <fieldset>
                <legend  align=center><h2>Contact Information :</h2></legend>
                
                <label for="address">Present Address :</label>
                <br>
                <input type="text" id="address" name="address" value="<?php echo $address ?>">
                <br>
                <?php echo $addressErr;?>
                <br>
                <br>

                <label for="address">Parmanet Address :</label>
                <br>
                <input type="text" id="peraddress" name="peraddress" value="<?php echo $peraddress ?>">
                <br>
                <?php echo $peraddressErr;?>
                <br>
                <br>
             
                
                <label for="phone">Phone-Number :</label>
                <br>
                <input type="number"  id="phone" name="phone" value="<?php echo $phone ?>">
                <br>
                <?php echo $phoneErr;?>
                           
               </fieldset>

             <fieldset> 
             
             	<legend align=center><h2>Account Information</h2> </legend>

             <label for="userid">User Id</label>
      	     <input type="text" id="uname" name="uame" value="<?php echo $username?>">
      	     <br>
      	     <?php echo $usernameErr; ?>
      	     <br><br>
      	     <label for="password">Password</label>
              <br>
              <input type="password" id="password" name="password" value="<?php echo $password ?>">
              <br>
              <?php echo $passwordErr ?>
              <br>
              <label for="confirmpassword">Confirm Password</label>
              <br>
              <input type="password" id="confirmpassword" name="confirmpassword"  value="<?php echo $confirmpassword ?>">
              <br>
              <?php echo $confirmpasswordErr ?>
              <br>
   
              <div class="register-button">
              	<input type="submit" id="register" name="register" value="Register">
              </div>
             
        </form>
         <p>Already Have Account? <a href="dblogin.php">Log In</a></p>
     </div>
        
       </div>

</body>
</html> 