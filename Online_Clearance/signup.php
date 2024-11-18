<html>
<head>
	<title>Online Clearance</title>
	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
    <style>
        body{
          
            margin: 0;
            padding: 0;
            background-image: url("login.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        .image{
                filter: brightness(100);
            }
        .container {
            height: ;
        }
        </style>
</head>
<body style="background-color: #adb5bd;"> 
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Student Sign Up</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php"></a>
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
    <div class="container">
    <img src="login.jpg" width="10" height="10">
    <div class="container vh-90">
        <div class="row justify-content-center h-90">
            <div class="card w-50 my-auto shadow">
                <div class="card-header text-center bg-primary text-white">
                <h2>Sign Up Form</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                 <div class="form-group">
                    <label for="student_name">Email</label>
                    <input type="email" id="username" class="form-control" name="student_email" required/>
                </div>
                <div class="form-group">
                    <label for="student_name">Name</label>
                    <input type="text" id="student_name" class="form-control" name="student_name" required/>
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
                </div>
                <div class="form-group">
                    <label for="username">UserName</label>
                    <input type="text" id="username" class="form-control" name="username" required/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" id="password" class="form-control" name="password" required/>
                </div>
                <input type="submit" class="btn btn-primary w-100" value="Sign Up" name="submit">
            </form>
            <a href="index.php"style="text-decoration:none;"><button class="btn btn-primary w-50"> login </button></a>
            </div>
            <div class="card-footer text-right">
                <small>&copy; Clearance</small>
            </div>
            </div>
        </div>
    </div>
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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $email = $_POST['student_email'];
    $name = $_POST['student_name'];
    $matric = $_POST['matric'];
    $major = $_POST['student_major'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert the student record into the database
    $insertSql = "INSERT INTO students (student_email, student_name, matric, student_major, username, password, role) VALUES ('$email', '$name', '$matric', '$major', '$username', '$password','nonregular')";
    if ($conn->query($insertSql) === TRUE) {
        echo "Student record added successfully.";
    } else {
        echo "Error adding student record: " . $conn->error;
    }
}

$conn->close();
?>
<!-- CSS style to display the form vertically -->
<style>

.parent-container {
    display: block;
    justify-content: center;
    align-items: center;
    
}

    .form-group {
        display: block;
        flex-direction: column;
        margin-bottom: 10px;
    }

    .form-group label {
        margin-bottom: 5px;
    }

    input[type="email"],
    input[type="text"],
    input[type="password"] {
        padding: 5px;
        font-size: 14px;
    }

    input[type="submit"] {
        padding: 10px;
        font-size: 16px;
    }

</style>

<!-- HTML form for student sign up -->
