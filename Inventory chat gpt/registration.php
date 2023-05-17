<?php
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];
    $errors = array();


    $con = mysqli_connect('localhost', 'root', '', 'inventory');

    $name = stripcslashes($name);  
    $email = stripcslashes($email);  
   
    $password = stripcslashes($password);  
    $confirm_password = stripcslashes($confirm_password); 

    $name = mysqli_real_escape_string($con, $name);  
    $email = mysqli_real_escape_string($con, $email);  
    $password = mysqli_real_escape_string($con, $password); 
    $confirm_password = mysqli_real_escape_string($con, $confirm_password);  

     // Validate form data
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirm_password) { array_push($errors, "Passwords do not match"); }

  
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // If email exists
      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }
    if (!empty($errors))
{
  echo "<div class='error'>Please fix the following errors:\n<ul>";
	foreach ($errors as $error)
	echo "<li>$error</li>\n";

	echo "</ul></div>";
}

    if (count($errors) == 0) {
        // $password = md5($password);
        $sql = "insert into users values('$name','$email','$password')";
        $result = mysqli_query($con, $sql);  
        
        header('location: login.html'); // Redirect to login page
    }
    
     
?>