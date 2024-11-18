
<html>
<head>
	<title>Online Clearance</title>
	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <style>
        body{
            background-color: white;
        }
        </style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Admin Dashboard</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href=""></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="faculty.php">Faculty</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="editadd.php">Users</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Log out</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section id="hero" class="bg-light">
		<div class="container py-5">
			<div class="row">
				<div class="col-md-8">
					<h1>Online Student Clearance</h1>
				</div>
			</div>
		</div>
	</section>
    <footer>
        <div class="container">
    
</body>
</html>


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

// Displaying records
$sql = "SELECT * FROM faculty";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Department</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['faculty_id']."</td>
                <td>".$row['faculty_name']."</td>
                <td>".$row['department']."</td>
                <td><a href='edit_faculty.php?id=".$row['faculty_id']."'>Edit</a></td>
                <td><a href='delete_faculty.php?id=".$row['faculty_id']."'>Delete</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Add a faculty record
if (isset($_POST['submit'])) {
    $facultyName = $_POST['faculty_name'];
    $department = $_POST['department'];

    $insertSql = "INSERT INTO faculty (faculty_name, department) VALUES ('$facultyName', '$department')";
    if ($conn->query($insertSql) === TRUE) {
        echo "Faculty record added successfully.";
    } else {
        echo "Error adding faculty record: " . $conn->error;
    }
}

$conn->close();
?>
<!-- HTML form to add a faculty record -->
<form method="post" action="">
    <input type="text" name="faculty_name" placeholder="Faculty Name" required>
    <input type="text" name="department" placeholder="Department" required>
    <input type="submit" name="submit" value="Add Faculty">
</form>