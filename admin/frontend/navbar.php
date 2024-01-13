<?php include '../../common/adminPermition.php' ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #03aea8">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Alumni Management System</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="newAdmin.php">New Admin</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../backend/course.php">Manage course</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../backend/verify.php">Verify</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../frontend/eventManage.php">Events</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="gallery.php">Gallery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../backend/contact.php">Feedback</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../frontend/fund.php">Fund</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../frontend/job.php">Job</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profile.php">My account</a>
				</li>
			</ul>
			<ul class="navbar-nav me-4">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<?php echo $_SESSION['user_name']; ?>
					</a>
					<ul class="dropdown-menu" style="min-width:fit-content;" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="../../user/frontend/index.php">Goto User</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item text-danger" href="../../common/logout.php">
							Logout
						</a></li>
					</ul>
				</li>
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