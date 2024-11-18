
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
   
</head>
<body>
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
							<a class="nav-link" href="#"></a>
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
$user=$_SESSION['username'];
$link = mysqli_connect("localhost","root","","clearancedb");
$query="SELECT * from clearance where username='$user'";
$qu1="SELECT status from clearance where username='$user'";
$qu2="SELECT lib from clearance where username='$user'";
$qu3="SELECT finance from clearance where username='$user'";
$qu4="SELECT services from clearance where username='$user'";

$result=mysqli_query($link,$query);
//$result1=mysqli_query($link,$qu1);
//$result2=mysqli_query($link,$qu2);
//$result3=mysqli_query($link,$qu3);
//$result4=mysqli_query($link,$qu4);


echo "<table border='1' align='center'>";

echo "<tr>
		<!--<th>clearance id</th>
        <th>status</th>-->
        <th>Date submitted</th>
        <th>Email</th>
        <th>Name</th>
        <th>Course</th>
        <th>Reg No</th>
		<th>Library office</th>
		<th>Finance office</th>
		<th>Services office</th>    
		<th>Examiner office</th>  
        
    </tr>";
while($row=mysqli_fetch_array($result)){
    
    echo "<tr>";
    //echo "<td>".$row['clearance_id']."</td>";
    echo "<td>".$row['submission_date']."</td>";
    echo "<td>".$row['student_email']."</td>";
    echo "<td>".$row['student_name']."</td>";
    echo "<td>".$row['student_major']."</td>";
    echo "<td>".$row['matric']."</td>";
	echo "<td>".$row['lib']."</td>";
	echo "<td>".$row['finance']."</td>";
	echo "<td>".$row['services']."</td>";
	echo "<td>".$row['examiner']."</td>";
	//echo "<td>".$row['lib']."</td>";
    //CREATE AN ID VARIABLE THAT TRANSFER DATA 
    //echo "<td><a href='delete.php?id=".$row['regno']."'>Delete</a></td>";
    //echo "<td><a href='update.php?id=".$row['regno']."'>Update</a></td>";
    echo "</tr>";

}

//$qu3=12;

?>



