<?php
// Make a database connection
$servername = "localhost"; // replace with your database server name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "inventory"; // replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $id = $_POST["id"]; 
  $name = $_POST["name"]; 
  $category = $_POST["category"]; 
  $price = $_POST["price"]; 
  $quantity = $_POST["quantity"]; 
  $date = $_POST["date"];
  
  
  // Insert the data into the table
  $sql = "INSERT INTO inventory_list  VALUES ('$id', '$name','$category','$price','$quantity','$date')";
  if (mysqli_query($conn, $sql)) {
    header("location:inventory.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Inventory Data</title>
    <style>
    #registration {
  margin-top: 20px;
  padding: 10px;
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  
}

#registration h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

#registration form {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  
  
}



#registration input[type="text"],
#registration input[type="email"],
#registration input[type="password"] {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

#registration button[type="submit"] {
  margin-top: 10px;
  padding: 5px 10px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
 
  
  

}

#registration button[type="submit"]:hover {
  background-color: #5c5555;
}
</style>  
</head>
<body>

    <section id="registration">
        <h1>Insert Inventory Data</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Id : <input type="number" name="id"><br>
    Product Name : <input type="text" name="name"><br>
    Categoty : <input type="text" name="category"><br>
    Price : <input type="number" name="price"><br>
    Quantity : <input type="number" name="quantity"><br>
    Date : <input type="date" name="date"><br>
    
    <button type="submit">Add Data</button>
    </form>
    </section>
</body>
</html>
<!-- HTML form to get the data from user -->

