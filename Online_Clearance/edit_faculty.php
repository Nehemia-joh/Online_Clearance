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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $facultyID = $_POST['faculty_id'];
    $facultyName = $_POST['faculty_name'];
    $department = $_POST['department'];

    $updateSql = "UPDATE faculty SET faculty_name='$facultyName', department='$department' WHERE faculty_id='$facultyID'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Faculty record updated successfully.";
    } else {
        echo "Error updating faculty record: " . $conn->error;
    }
}

// Get the faculty record to be edited
if (isset($_GET['id'])) {
    $facultyID = $_GET['id'];
    $selectSql = "SELECT * FROM faculty WHERE faculty_id='$facultyID'";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $facultyName = $row['faculty_name'];
        $department = $row['department'];

        // HTML form to edit the faculty record
        echo '<form method="post" action="">
                <input type="hidden" name="faculty_id" value="' . $facultyID . '">
                <input type="text" name="faculty_name" value="' . $facultyName . '" placeholder="Faculty Name" required>
                <input type="text" name="department" value="' . $department . '" placeholder="Department" required>
                <input type="submit" name="submit" value="Update Faculty">
            </form>';
    } else {
        echo "Faculty record not found.";
    }
}

$conn->close();
?>