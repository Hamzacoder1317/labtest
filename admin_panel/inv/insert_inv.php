<?php
require("../shared/config.php");

// Get raw POST data
$jsonData = file_get_contents("php://input");

// Decode JSON data
$inventryData = json_decode($jsonData, true);

// Validate input
if (empty($inventryData['inv_Equipment_Name']) || empty($inventryData['inv_Make']) || empty($inventryData['inv_Model'])
|| empty($inventryData['inv_Serial']) || empty($inventryData['inv_Specification'])) {
    echo "Please provide values for required fields.";
    exit;
}

$a = $inventryData['inv_Equipment_Name'];
$b = $inventryData['inv_Make'];
$c = $inventryData['inv_Model'];
$d = $inventryData['inv_Serial'];
$e = $inventryData['inv_Specification'];


// You can add additional validation logic if needed

// SQL query to insert data
$sql = "INSERT INTO `inventry`( `inv_Equipment_Name`, `inv_Make`, `inv_Model`, `inv_Serial`, `inv_Specification`)
VALUES ('$a','$b','$c','$d','$e')";

// Perform the query
if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Duplicate Data";
}

// Close the database connection
$conn->close();
?>