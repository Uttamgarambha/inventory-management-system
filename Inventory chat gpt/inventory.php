<?php 

// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'inventory');

$sql = "select * from inventory_list;";  
$result = $conn->query($sql);
     
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inventory List</title>
    <!-- <link rel="stylesheet" href="inventory_list.css"> -->
    <style>
        /* Style for header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    color: #fff;
    padding: 1rem;
  }
  
  .logo img {
    height: 50px;
  }
  
  nav ul {
    display: flex;
    list-style: none;
  }
  
  nav ul li {
    margin-left: 1rem;
  }
  
  nav ul li a {
    color: #fff;
    text-decoration: none;
  }
  
  /* Style for main content */
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
    padding: 0.5rem;
  }
  
  th {
    background-color: #333;
    color: #fff;
  }
  
  tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  /* Style for footer */
  footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
  }
  
    </style>
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="logo.png" alt="Logo">
        <!-- <h1 style="color:white;padding: 10px;">StockPile</h1> -->
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
      <h1>Inventory List</h1>

      <table >
      <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Date</th>
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
      <td><?php echo $row[5]; ?></td>
      
      <td><form method="post" action="inventory_del_up.php">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>"> 
        <button style="color:green" type="submit" name="update_button">Update</button>
      </form></td>
      <td><form method="post" action="inventory_del_up.php">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>"> 
        <button style="color:red" type="submit" name="delete_button">Delete</button>
      </form></td>
      

 
     
  <?php
          }
          ?>
    
            
    </tbody>
     </table>
     <br>
     <center><button><a href="inventory_insert.php">Add Product</a> </button></center>
     </main>
    <footer>
      <p>&copy; 2023 Inventory Management System</p>
    </footer>
</body>
</html>
 
