<?php
$link=mysqli_connect("localhost","root","","clearancedb");
$id=$_GET['id'];
//sql query for row needed to be updated
$query="SELECT * FROM data WHERE regno ='$id'";
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
    REGISTRATION NUMBER: <input type="text" name="regno" value="<?php echo $row['regno'];?>"><br><br>
    FULL NAME: <input type="text" name="Fname" value="<?php echo $row['name'];?>"><br><br>
    COURSE: <input type="text" name="course" value="<?php echo $row['course'];?>"><br><br>
    <input type="submit" value="SAVE CHANGES">
</form>    
    <?php
        if(isset($_POST['submit'])){
            $link = mysqli_connect("localhost","root","","db");
            $regno =$_POST['regno'];        
            $Fname = $_POST['Fname'];        
            $course = $_POST['course'];

            if($regno!= "" && $Fname!= "" && $course!= ""){
                $query="UPDATE data SET regno='$regno',name='$Fname',course='$course' WHERE regno='$id'";
                $result=mysqli_query($link,$query);
                if($result){
                    // echo "<font color=green> DATA SAVED";
                    header("location:fetch.php");
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

