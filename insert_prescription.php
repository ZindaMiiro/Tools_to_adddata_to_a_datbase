<?php
// Include the database connection code
require_once("connect.php");

// Get values from the form
$patient_name = $_POST['patient_name'];
$drug_name = $_POST['Drug_Name'];
$doctor_name = $_POST['Doctor_Name'];
$dosage = $_POST['Dosage'];
$start_date = $_POST['Start_date'];
$end_date = $_POST['End_date'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO patient_prescription (Patient_Name, Drug_Name, Doctor_Name, Dosage, Start_date, End_date)
        VALUES ('$patient_name', '$drug_name', '$doctor_name', '$dosage', '$start_date', '$end_date')";

if ($conn->query($sql) === TRUE) {
    echo "Prescription inserted successfully!";
} else {
    echo "Error inserting prescription: " . $conn->error;
}

// Close the database connection
$conn->close();
?>