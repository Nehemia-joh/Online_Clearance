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
							<a class="nav-link" href=""></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="faculty.php"></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="editadd.php">Users</a>
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
	<p>&copyclearance <?php echo date("Y"); ?> Online Clearance. All rights reserved.</p>
</body>
</html>