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
				<a class="navbar-brand" href="#">Services Dashboard</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href=""></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="approveclearance.php"></a>
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
	<?php
	$link = mysqli_connect("localhost","root","","clearancedb");
$query="select * from clearance";
$result=mysqli_query($link,$query);

echo "<table border='' align='center'>";

echo "<tr>
        <th>Clearance id</th>
        <th>Submission Date</th>
        <th>Email</th>
        <th>student name</th>
        <th>Student major</th>
        <th>Regno</th>
        <th>Approval status</th>
        <th colspan='2'>ACTION</th>        
        
    </tr>";
while($row=mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>".$row['clearance_id']."</td>";
    echo "<td>".$row['submission_date']."</td>";
    echo "<td>".$row['student_email']."</td>";
    echo "<td>".$row['student_name']."</td>";
    echo "<td>".$row['student_major']."</td>";
    echo "<td>".$row['matric']."</td>";
    echo "<td>".$row['services']."</td>";
    //CREATE AN ID VARIABLE THAT TRANSFER DATA
     
    echo "<td><a href='approval_services.php?id=".$row['clearance_id']."'>Approve</a></td>";
	echo "<td><a href='visit_services.php?id=".$row['clearance_id']."'>Visit office</a></td>";
    //echo "<td><a href='update.php?id=".$row['regno']."'>Update</a></td>";
    echo "</tr>";
}
echo"</table>";
?>
	<p>&copyclearance <?php echo date("Y"); ?> Online Clearance. All rights reserved.</p>
</body>
</html>