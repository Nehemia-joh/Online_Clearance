
<html>
<head>
	<title>Online Clearance</title>
	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
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
							<!--<a class="nav-link" href="student.php">Students</a>-->
						</li>
						<li class="nav-item">
							<a class="nav-link" href="faculty.php"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="approveclearance.php">Approval</a>
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
	<div class="container">
	<p>&copyclearance <?php echo date("Y"); ?> Online Clearance. All rights reserved.</p>
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

// Fetch all users
$users = getUsers($conn);
?>

<!-- Display the users in a table -->
<table>
    <tr>
        <th>Full Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th>Created On</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['fullname']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td><?php echo $user['created_on']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<!-- Add/Edit User Form -->
<h2>Add User</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
    <label for="fullname">Full Name:</label>
    <input type="text" name="fullname" id="fullname" required><br>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <label for="role">Role:</label>
    <input type="text" name="role" id="role" required><br>

    <input type="submit" value="Submit">
</form>

<?php
// Close the database connection
mysqli_close($conn);
?>