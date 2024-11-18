<html>
<head>
	<title>Online Clearance</title>
	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Student Dashboard</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="submitclearance.php">Clearance</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="viewclearance.php">Status</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Log Out</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"></a>
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

</body>
</html>

<?php
session_start();
$_SESSION['username'];
//$_SESSION['student_id'];
// Database connection details
$host = "localhost";
$db_username = "root";
$db_password = "";
$database = "clearancedb";

// Create database connection
$connection = mysqli_connect($host, $db_username, $db_password, $database);

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the student is logged in (You can modify this part based on your authentication logic)
$studentid = $_SESSION['username']; // Assuming you have the student ID of the logged-in student

$query = "SELECT * FROM students WHERE username = '$studentid'";
$result = mysqli_query($connection, $query);

// Check if the student record is found
if (mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result);
} else {
    echo "Student record not found.";
}

// Close the database connection
mysqli_close($connection);
?>

    
	<h2>Student Details</h2>
	<div class ="table-container">
        <table class="center-table" border=3.5 class="students-table" >
            <tr>
                <th class="column-separation">Student ID</th>
                <th class="column-separation">Name</th>
                <th class="column-separation">Email</th>
                <th class="column-separation">Major</th>
                
            </tr>
            <tr>
                <td><?php echo $student['student_id']; ?></td>
                <td><?php echo $student['student_name']; ?></td>
                <td><?php echo $student['student_email']; ?></td>
                <td><?php echo $student['student_major']; ?></td>
                <!--<td><?php echo $student['student_username']; ?></td>-->
            </tr>
        </table>
		<div class="container">
	<p>&copyclearance <?php echo date("Y"); ?> Online Clearance. All rights reserved.</p>