<?php
require("../shared/config.php");

$name = $_POST['name'];

$sql = "SELECT * FROM `inventry` WHERE `inv_Equipment_Name` LIKE '%$name%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data from the result set
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Return the data as JSON
    echo json_encode($data);
} else {
    echo json_encode(array('message' => 'No records found'));
}

// Close the database connection
$conn->close();
?>