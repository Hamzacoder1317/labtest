<?php
require("../shared/config.php");

// Get raw POST data
$jsonData = file_get_contents("php://input");

// Decode JSON data
$employeeData = json_decode($jsonData, true);

// Validate input
if (empty($employeeData['Emp_Id']) || empty($employeeData['Emp_Name']) || empty($employeeData['Emp_Department'])
|| empty($employeeData['Emp_Position']) || empty($employeeData['Emp_Number'])
|| empty($employeeData['Emp_Cnic_No']) 
|| empty($employeeData['Emp_Email'])) {
    echo "Please provide values for required fields.";
    exit;
}

$empId = $employeeData['Emp_Id'];
$empName = $employeeData['Emp_Name'];
$empDepartment = $employeeData['Emp_Department'];
$empPosition = $employeeData['Emp_Position'];
$empNumber = $employeeData['Emp_Number'];
$empCnicNo = $employeeData['Emp_Cnic_No'];
$empEmail = $employeeData['Emp_Email'];
$empAddress = $employeeData['Emp_Address'];

// You can add additional validation logic if needed

// SQL query to insert data
$sql = "INSERT INTO `employee`(`Emp_Id`, `Emp_Name`, `Emp_Department`, `Emp_Position`, `Emp_Number`, `Emp_Cnic_No`, `Emp_Email`, `Emp_Address`) 
        VALUES ('$empId','$empName','$empDepartment','$empPosition','$empNumber','$empCnicNo','$empEmail','$empAddress')";

// Perform the query
if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Duplicate Data";
}

// Close the database connection
$conn->close();
?>