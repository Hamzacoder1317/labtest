<?php
require("../shared/config.php");

// Get raw POST data
$jsonData = file_get_contents("php://input");

// Decode JSON data
$employeeData = json_decode($jsonData, true);

// Validate input
if (empty($employeeData['Emp_Id'])) {
    echo "Please provide an Employee ID.";
    exit;
}

$empId = $employeeData['Emp_Id'];

// SQL query to delete data
$sql = "DELETE FROM `employee` WHERE `id` = '$empId'";

// Perform the query
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
