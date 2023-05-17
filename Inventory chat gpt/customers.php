<?php 

// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'inventory');

$sql = "select * from customer_list;";  
$result = $conn->query($sql);
     
?> 


<!DOCTYPE html>
<html>
  <head>
    <title>Customer List</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
   

header {
  background-color: #333;
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
}

.logo img {
  height: 50px;
}

nav ul {
  list-style: none;
  display: flex;
}

nav ul li {
  margin-left : 1rem;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  
}

main {
  max-width: 800px;
  margin: 0 auto;
  padding: 1rem;
}

h1 {
  font-size: 36px;
  margin-bottom: 20px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 0.5em;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #333;
  color: #fff;
}
footer {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
} 

 </style>
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="logo.png" alt="Logo">
      </div>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="inventory.php">Inventory</a></li>
          <li><a href="orders.php">Orders</a></li>
          <li><a href="customers.php">Customers</a></li>
          <li><a href="reports.html">Reports</a></li>

        </ul>
      </nav>
    </header>
    <main>
    <h1>Customer List</h1>
      <table>
        <thead>
        <tr>
          <th>Customer ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
        </thead>
        <tbody>
          <?php
          while($row = $result->fetch_row()){
         

         
          
      ?>

      <tr>

      <td><?php echo $row[0]; ?></td>
      <td><?php echo $row[1]; ?></td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row[3]; ?></td>
      <td><?php echo $row[4]; ?></td>
      
      <td><form method="post" action="customers_del_up.php">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>"> 
        <button style="color:green" type="submit" name="update_button">Update</button>
      </form></td>
      <td><form method="post" action="customers_del_up.php">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>"> 
        <button style="color:red" type="submit" name="delete_button">Delete</button>
      </form></td>
      

 
     
  <?php
          }
          ?>
        </tbody>
      </table>
      <br>
     <center><button><a href="customers_insert.php">Add Customers</a> </button></center>
    </main>
    <footer>
      <p>&copy; 2023 Inventory Management System</p>
    </footer>
  </body>
</html>
