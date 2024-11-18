<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clearancedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the faculty ID is provided
if (isset($_GET['id'])) {
    $facultyID = $_GET['id'];

    // Delete the faculty record from the database
    $deleteSql = "DELETE FROM faculty WHERE faculty_id='$facultyID'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Faculty record deleted successfully.";
    } else {
        echo "Error deleting faculty record: " . $conn->error;
    }
}

$conn->close();
?>