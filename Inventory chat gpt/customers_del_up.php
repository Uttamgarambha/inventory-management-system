

<?php

$conn = mysqli_connect('localhost', 'root', '', 'inventory');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  

if(isset($_POST['delete_button'])) {
    $id = $_POST['id']; // retrieve the id of the record to delete from the form
    $query = "DELETE FROM customer_list WHERE customer_id = $id"; // replace table_name with the actual name of your table
    mysqli_query($conn, $query); // execute the query
    header("location:customers.php");
}

if(isset($_POST['update_button'])) {
    $id = $_POST['id']; // retrieve the id of the record to delete from the form
    $query = "DELETE FROM customer_list WHERE customer_id = $id"; // replace table_name with the actual name of your table
    mysqli_query($conn, $query); // execute the query
    header("location:customers_insert.php");
}
?>


       