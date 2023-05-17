<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the date range



$month =$_POST['month'];
$year = $_POST['year'];
$start_date = "$year-$month-01";
$end_date = date('Y-m-t', strtotime($start_date));

// Query the inventory data for the date range
$sql = "SELECT name, SUM(quantity) as total_quantity,price, SUM(price * quantity) as total_price 
        FROM inventory_list 
        WHERE date BETWEEN '$start_date' AND '$end_date'
        GROUP BY name";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Reports</title>
		<style>
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
		font-size: 2rem;
		margin-bottom: 1rem;
	  }
	  footer {
		background-color: #333;
		color: #fff;
		text-align: center;
		padding: 10px;
	  }
	
			#reports {
	  margin-top: 20px;
	  padding: 10px;
	  background-color: #f5f5f5;
	  border: 1px solid #ddd;
	}
	
	#reports h2 {
	  font-size: 24px;
	  margin-bottom: 10px;
	}
	
	.report-types {
	  display: flex;
	  justify-content: space-between;
	  margin-bottom: 10px;
	}
	
	.report-types a {
	  padding: 5px 10px;
	  background-color: #ddd;
	  color: #333;
	  border: 1px solid #ccc;
	  border-radius: 3px;
	  text-decoration: none;
	}
	
	.report-types a:hover {
	  background-color: #ccc;
	}
	
	.report-display {
	  /* Styling for the report display area */
	  margin: 0;
	}
	table {
		border-collapse: collapse;
		width: 100%;
	}
	th, td {
		text-align: left;
		padding: 8px;
	}
	tr:nth-child(even){background-color: #f2f2f2}
	th {
		background-color: #333;
		color: white;
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
		<div id="reports">
			<h2>Reports</h2>
			<div class="report-types">
			  <a href="sales_report.php">Sales Report</a>
			  <a href="inventory_report.php">Inventory Report</a>
			  <a href="about_us.html">About Us</a>
			</div>
			<div class="report-display">
			  <!-- Report display area, to be filled with dynamically generated content -->
			  <header>
		<h1>Inventory Report</h1>
		
	</header>
	
	<main>
       
		<table>
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Total Quantity</th>
                    <th>Unit Price</th>
					<th>Total price</th>
				</tr>
			</thead>
			<tbody>
                <?php
                 $total_quantity = 0;
                 $total_price = 0;
                 $unit_price =0;
                     while($row = $result->fetch_assoc()) {
						// echo "Month/Year: " . $row["month_year"]. " - Total Quantity: " . $row["total_quantity"]. " - Total Sales: $" . $row["total_sales"]. "<br>";
        ?>
				<tr>
                <td><?php echo  $row["name"] ?></td>
      			<td><?php echo $row["total_quantity"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
    		    <td><?php echo $row["total_price"]; ?></td>
				</tr>
                <?php
                $total_quantity += $row["total_quantity"];
                $unit_price += $row["price"];
                $total_price += $row["total_price"];
				
                     }
                    } else {
                        echo "0 results";
                    }
                    
                    $conn->close();
                    ?>
                     
			</tbody>
			<tfoot>
				<tr>
					<th>Total</th>
					<td><?php echo  $total_quantity ?></td>
                    <td><?php echo  $unit_price ?> $</td>
					<td><?php echo  $total_price ?> $</td>
				</tr>
			</tfoot>
		</table>
        <br>
        <button style="background-color:#f3f3f3;border-radius :7px;"><a href="inventory_report.php">< Back</a></button>
	</main>
			</div>
		  </div>
		  <footer>
			<p>&copy; 2023 Inventory Management System. All rights reserved.</p>
		  </footer>
	</body>
	</html>


