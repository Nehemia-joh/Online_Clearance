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

// Function to delete a user from the database
function deleteUser($conn, $userId) {
    $query = "DELETE FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

// Fetch all users
$users = getUsers($conn);

// Check if a user deletion request is made
if (isset($_GET['delete_user'])) {
    $userId = $_GET['delete_user'];
    $deleteResult = deleteUser($conn, $userId);

    if ($deleteResult) {
        echo "User deleted successfully.";
    } else {
        echo "Failed to delete user.";
    }
}
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
                <a href="edit.php=<?php echo $user['id']; ?>">Edit</a> |
                <a href="delete.php=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
// Close the database connection
mysqli_close($conn);
?>