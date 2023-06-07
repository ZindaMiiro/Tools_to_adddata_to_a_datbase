<?php
require_once("connect.php"); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ssn = $_POST["ssn"]; 
    $Username = $_POST["Username"];
    $name = $_POST["name"];
	$number = $_POST["Number"];
    $address = $_POST["Address"];
	$email = $_POST["Email"];
    $Date_of_birth = $_POST["Date_of_birth"];

    $sql = "INSERT INTO patients (SSN,Username, Name,Number, Address,Email, Date_of_birth) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error: " . $conn->error);
    }
    
    $stmt->bind_param("sssissd", $ssn, $Username, $name, $number, $address, $email, $Date_of_birth);
    $result = $stmt->execute();
    
    if ($result === false) {
        die("Error: " . $stmt->error);
    }
    
    if ($stmt->affected_rows > 0) {
        echo "Patient's information inserted successfully.";
    } else {
        echo "Failed to insert patient's information.";
    }
    
    $stmt->close();
}

$conn->close();
?>