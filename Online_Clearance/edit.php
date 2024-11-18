<?php
$link=mysqli_connect("localhost","root","","clearancedb");
$id=$_GET['id'];
//sql query for row needed to be updated
$query="SELECT * FROM users WHERE id ='$id'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM THAT SEND DATA INTO A DATABASE</title>
</head>
<body>
    <form action="" method="POST">
    fullname<br><input type="text" name="fullname" value="<?php echo $row['fullname'];?>"><br>
    Username<br><input type="text" name="username" value="<?php echo $row['username'];?>"><br>
    password<br><input type="text" name="password" value="<?php echo $row['password'];?>"><br>
    role<br><input type="text" name="role" value="<?php echo $row['role'];?>"><br>
    <input type="submit" name="submit" value="SAVE CHANGES">
</form>    
    <?php
        if(isset($_POST['submit'])){
            $link = mysqli_connect("localhost","root","","clearancedb");
            $fn =$_POST['fullname'];        
            $un = $_POST['username'];        
            $pw= $_POST['password'];
            $rl= $_POST['role'];

            if(True){
                $query="UPDATE users SET fullname='$fn',username='$un',password='$pw',role='$rl' WHERE id='$id'";
                $result=mysqli_query($link,$query);
                if($result){
                    echo "<font color=green> changes made";
                    header("location:editadd.php");
                } else{
                    // echo 
                    echo mysqli_error($link);
                }
            }
            else{
                    echo "<font color=red>PLEASE FILL IN ALL FIELDS</font>";
            }
            mysqli_close($link);
        }
    ?>
</body>
</html>

