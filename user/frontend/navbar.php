<?php if(session_status() !== PHP_SESSION_ACTIVE)
    session_start(); ?>
<head>
	<style>
		/* .navbar-clr{
			background-color: #00b2ff;
		} */
		.navbar-brand{
			color:white;
			margin-left: 2px;
			font-size: 25px;
			font-weight: bold;
		}
		.navbar-clr a{
			color:#f1f1f1;
		}
		.navbar-clr a:hover{
			color:white;
		}
	</style>
</head>
<nav class="navbar navbar-expand-lg navbar-clr">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Alumni Management System</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php">HOME</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="events.php">EVENTS</a>
				</li>
				<?php if(isset($_SESSION["user_email"])) { 
					echo '
				<li class="nav-item">
					<a class="nav-link" href="job.php">JOB</a>
				</li>';
				} ?>
				<li class="nav-item">
					<a class="nav-link" href="gallery.php">GALLERY</a>
				</li>
				<?php if(isset($_SESSION["user_email"])) { 
						echo '<li class="nav-item">
							<a class="nav-link text-dark fw-bold" href="../../common/logout.php">Logout</a>
						</li>';
					} 
					else {
						echo '<li class="nav-item">
							<a class="nav-link" href="login.php">LOGIN</a>
						</li>';
					}
				?>
				<?php if(!isset($_SESSION["user_email"])) { 
						echo '<li class="nav-item">
								<a class="nav-link" href="alumniRegi.php">NEW ALUMNI</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="staffRegi.php">NEW STAFF</a>
							</li>';
					}
				?>
				<?php if(isset($_SESSION["user_email"])) { 
					echo '
				<li class="nav-item">
					<a class="nav-link" href="fund.php">FUND</a>
				</li>';} ?>
				<li class="nav-item">
					<a class="nav-link" href="successStories.php">SUCCESS STORIES</a>
				</li>
				
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<?php if(isset($_SESSION["user_email"])) { 
						echo '<a class="nav-link" aria-current="page" href="#">'.$_SESSION["user_name"].'</a>';
					} 
					else { 
						echo '<a class="nav-link" aria-current="page" href="../../admin/frontend/login.php">Admin
							Login</a>';
					}?>
				</li>
				<?php
					if(isset($_SESSION["user_email"]) && isset($_SESSION["user_role"])=='admin'){
						echo '
						<li class="nav-item">
						<a class="nav-link" aria-current="page" href="../../admin/frontend/index.php">
							<span class="text-light"/>GoTo Admin</span>
						</a>
						</li>';
					}
				?>
				
			</ul>
		</div>
	</div>
</nav>
<?php
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	echo '<h4 class="text-center"  style="color:red;">' . $message . '</h4>';
	unset($_SESSION['message']);
}
?>