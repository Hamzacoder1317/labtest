<?php
require("../shared/config.php");

// Get raw POST data
$jsonData = file_get_contents("php://input");

// Decode JSON data
$inventryData = json_decode($jsonData, true);

// Validate input
if (empty($inventryData['inv_Id'])) {
    echo "Please provide an inventry ID.";
    exit;
}

$invId = $inventryData['inv_Id'];

// SQL query to delete data
$sql = "DELETE FROM `inventry` WHERE `id` = '$invId'";

// Perform the query
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
