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
							<a class="nav-link" href="#">Students</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="faculty.php">Faculty</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="users.php">Users</a>
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

// Function to fetch all users from the database
function getUsers($conn) {
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $users = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    return $users;
}

// Function to display users in a table
function displayUsers($users) {
    echo ' <div class ="table-container">
            <table border=3.5 class="user-table">
            <tr>
                <th class="column-separation">Full Name</th>
                <th class="column-separation">Username</th>
                <th class="column-separation">Password</th>
                <th class="column-separation">Role</th>
                <th class="column-separation">Created On</th>
                <th>Action</th>
            </tr>';

    foreach ($users as $user) {
        echo '<tr>
                <td>'.$user['fullname'].'</td>
                <td>'.$user['username'].'</td>
                <td>'.$user['password'].'</td>
                <td>'.$user['role'].'</td>
                <td>'.$user['created_on'].'</td>
                <td>
                    <a href="edit.php?id='.$user['id'].'">Edit</a> |
                    <a href="delete.php?id='.$user['id'].'">Delete</a>
                </td>
            </tr>';
    }

    echo '</table>
            </div>';
}



/* I added the function of adding new users to this file*/
// Function to get user by ID
function getUserById($conn, $userId) {
    $query = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

// Function to add a new user to the database
function addUser($conn, $fullname, $username, $password, $role, $created_on) {
    $query = "INSERT INTO users (fullname, username, password, role, created_on)
              VALUES ('$fullname', '$username', '$password', '$role', '$created_on')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true; // User added successfully
    } else {
        return false; // Failed to add user
    }
}

// Function to update an existing user in the database
function updateUser($conn, $userId, $fullname, $username, $password, $role) {
    $query = "UPDATE users SET fullname = '$fullname', username = '$username',
              password = '$password', role = '$role' WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true; // User updated successfully
    } else {
        return false; // Failed to update user
    }
}

// Check if the form is submitted for adding or editing a user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an ID is provided for editing
    if (!empty($_POST["id"])) {
        $userId = $_POST["id"];
        $user = getUserById($conn, $userId);

        if ($user) {
            // Update existing user
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $role = $_POST["role"];

            $updateResult = updateUser($conn, $userId, $fullname, $username, $password, $role);

            if ($updateResult) {
                echo "User updated successfully.";
            } else {
                echo "Failed to update user.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        // Add new user
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"];
        $created_on = date("Y-m-d H:i:s");

        $addResult = addUser($conn, $fullname, $username, $password, $role, $created_on);

        if ($addResult) {
            echo "User added successfully.";
        } else {
            echo "Failed to add user.";
        }
    }
}

// Get all users
$users = getUsers($conn);

// Display users in a table
displayUsers($users);

// Close the database connection
mysqli_close($conn);
?>
<!-- Footer -->
<footer>
    <div class="container">
        <p>&copyOnline Clearance <?php echo date("Y"); ?> Online Clearance. All rights reserved.</p>
</div>
</footer>