<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
   
</head>
<body style="background-color: #adb5bd;">
    <header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Student Clearance</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="viewclearance.php"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="student.php">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="submitclearance.php">Clearance</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Log Out</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section id="hero" class="bg-light">
		<div class="container py-5" style="justify-content: center; align-items: center; text-align: center;">
			<div class="row">
				<div class="col-md-8">
					<h1>Online Student Clearance</h1>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
    <div class="container vh-90">
        <div class="row justify-content-center h-90">
            <div class="card w-50 my-auto shadow">
                <div class="card-header text-center bg-primary text-white">
                <h2>Clearance Form</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                 <div class="form-group">
                    <label for="student_name">Email</label>
                    <input type="email" id="username" class="form-control" name="student_email" required/>
                </div>
				<div class="form-group">
                    <label for="username">UserName</label>
                    <input type="text" id="username" class="form-control" name="username" required/>
                </div>
                <div class="form-group">
                    <label for="matric">RegNo</label>
                    <input type="text" id="matric" class="form-control" name="matric" required/>
                </div>
                <div class="form-group">
                    <label for="student_major">Course</label>
                    <select name="student_major">
                    <option value="computer science">computer science</option>
                    <option value="IT">IT</option>
                    <option value="cyber security">cyber security</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Economic and finace">Economics and finance</option>
                    <option value="finance & banking">Finance and banking</option>
                    </select>
                </div><br>
               
                <input type="submit" class="btn btn-primary w-100" value="Submit" name="submit">
            </form>
            </div>
            <div class="card-footer text-right">
                <small>&copy; Clearance</small>
            </div>
            </div>
        </div>
    </div>

<!-- the previous form was placed here-->
    
<!--It ended here-->

</body>
</html>

<?php
// Start the session or authenticate user if required
session_start();
// Check if the user is logged in
//if (!isset($_SESSION['user_id'])) {
    //header('Location: login.php');
    //exit;
//}

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clearancedb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the student ID from the session
    include('db_connect.php');
    

// Check if the form is submitted
if (isset($_POST['submit'])) {
    
    // Get form data
    $user_id = $_SESSION['username'];
    //$uid="";
    
    $student_email = $_POST['student_email'];
    $student_name = $_POST['student_name'];
    $matric = $_POST['matric'];
    $student_major = $_POST['student_major'];
    $time=date('Y-m-d');
    //$yu=mysqli_query($link,$uid);

        // Insert the clearance request into the Clearance table
    $insertSql = "INSERT INTO clearance (submission_date,student_email,student_name,student_major,matric,username,lib,finance,services,examiner)
    VALUES ('$time','$student_email', '$student_name', '$student_major', '$matric','$user_id','Pending','Pending','Pending','Pending')";
if (mysqli_query($link, $insertSql)) {
echo "Request sent succesfully";

//i added the location after the form submission
header("location:student.php");
$clearance_id = mysqli_insert_id($link);
//echo "Clearance request submitted successfully. Clearance ID: " . $clearance_id;
} else {
echo "Error submitting clearance request: " . mysqli_error($link);
}

    }


// Close the database connection
//mysqli_close($connection);
?>

