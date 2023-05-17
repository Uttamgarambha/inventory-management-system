<?php
// Initialize variables
$email = "";
$password = "";
$errors = array();

// Connect to MySQL database
$db = mysqli_connect('localhost', 'root', '', 'inventory');



  // Collect form data
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Validate form data
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // If there are no errors, log in the user
  if (count($errors) == 0) {
    // $password = password_verify($password); // decrypt password before comparing with database
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $query);
    if (!empty($errors))
{
  echo "<div class='error'>Please fix the following errors:\n<ul>";
	foreach ($errors as $error)
	echo "<li>$error</li>\n";

	echo "</ul></div>";
}

    if (mysqli_num_rows($result) == 1) { // If user is found
      $_SESSION['email'] = $email; // Set session variable
      header('location: inventory.php'); // Redirect to inventory page
    } else {
      header('location: registration.html');
    }
  }

?>
