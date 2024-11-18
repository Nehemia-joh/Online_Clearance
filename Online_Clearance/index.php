<html>
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            height: 100vh;
        }
        </style>
</head>

<body>
    <div class="container">
    <img src="login.jpg" width="10" height="10">
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-25 my-auto shadow">
                <div class="card-header text-center bg-primary text-white">
                <h2>Login Form</h2>
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                 <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" class="form-control" name="username" required/>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" id="password" class="form-control" name="password" required/>
                </div>
                <input type="submit" class="btn btn-primary w-100" value="Login" name="submit">
            </form>
            <a href="signup.php"style="text-decoration:none;"><button class="btn btn-primary w-90"> Sign up </button></a>
            </div>
            <div class="card-footer text-right">
                <small>&copy; Clearance</small>
            </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    if(isset($_POST['submit'])){
         //connect to database
         include "link.php";
        if(!$link){
            die('Unable to connect to database');
        }

        $username = mysqli_real_escape_string($link, $_POST['username']); //sanitize user input
        $password = mysqli_real_escape_string($link, $_POST['password']);

        if(empty($username) && empty($password)){
            echo "<p style='color:red;'>Please enter your login credentials</p>";
        }else{
            $query = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
            $result = mysqli_query($link,$query);

            // check if user exists
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                // authorization level
                switch($_SESSION['role']){
                	case 'admin':
                		header("location: admin.php");
                		break;
                	case 'register':
                		header("location: register.php");
                		break;
                	case 'lecture':
                		header("location: lecture.php");
                		break;
                	case 'student':
                		header("location: student.php");
                		break;
                    case 'nonregular':
                        header("location: student.php");
                        break;
                    case 'library':
                        header("location: library.php");
                        break;
                    case 'services':
                        header("location: services.php");
                        break;
                    case 'finance':
                        header("location: finance.php");
                        break;
                	default:
                		echo "<p style='color:red;'>Invalid role</p>";
                }
            }else {
                echo "<p style='color:red;'>Invalid login credentials</p>";
            }
        }
        $username1 = mysqli_real_escape_string($link, $_POST['username']); //sanitize user input
    $password2 = mysqli_real_escape_string($link, $_POST['password']);

    $query1 = "SELECT * FROM students WHERE username ='$username1' AND password = '$password2'";
    $result1 = mysqli_query($link,$query1);
     // check if user exists
     if(mysqli_num_rows($result1)==1){
        $row = mysqli_fetch_array($result1);
        $_SESSION['username'] = $row['username'];
        //$_SESSION['student_id'] = $row['student_id'];
        $_SESSION['role'] = $row['role'];

        // authorization level
        switch($_SESSION['role']){
            /*case 'admin':
                header("location: admin.php");
                break;
            case 'register':
                header("location: register.php");
                break;
            case 'lecture':
                header("location: lecture.php");
                break;*/
            case 'student':
                header("location: student.php");
                break;
                case 'nonregular':
                    header("location: student.php");
                    break;
            default:
                echo "<p style='color:red;'>Invalid role</p>";
        }
    }else {
        echo "<p style='color:red;'>Invalid login credentials</p>";
    }

    }

    

    /*Added a head tag with a title.
Changed password input type to "password" for security.
Added session_start() function.
Sanitized user inputs using mysqli_real_escape_string().
Added default case to switch statement in case role is not found.
Added error messages if login credentials are invalid or if inputs are empty.
Used switch statement instead of if-else for authorization level.
Added error message if user's role is invalid.
*/
    ?>
</body>
</html>
