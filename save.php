<?php
$server = "localhost";
$username = "root";
$password = "";  
$database = "employees";

// Create a connection
$conn = new mysqli($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data using POST method (Ensure the form method is POST)
$employeeName = isset($_POST['employeeName']) ? $_POST['employeeName'] : ''; 
$employeeRole = isset($_POST['employeeRole']) ? $_POST['employeeRole'] : '';

// Using prepared statements for security
$stmt = $conn->prepare("INSERT INTO employees (name, role) VALUES (?, ?)");
$stmt->bind_param("ss", $employeeName, $employeeRole);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

