<?php
include('index.php');
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "procurement");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
// <!-- $text="<script>document.writeln(document.getElementById('exampleModalLabel').innerHTML);</script>"; -->
$pD = $_POST['productDescription'];
$qT = $_POST['qty'];
$uC = $_POST['unitCost'];
$tC = $_POST['totalCost'];

// Attempt insert query execution
$sql = "INSERT INTO product (ProductDescription, Qty, UnitCost, TotalCost) VALUES ('$pD', '$qT', '$uC', '$tC')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>