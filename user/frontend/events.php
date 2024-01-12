<!DOCTYPE html>
<html lang="en">

<head>
	<title>Events</title>
	<?php include '../../common/headRef.php'; ?>
</head>

<body>
	<?php include 'navbar.php'; ?>
	<?php include '../../common/getEvents.php'; ?>
	<div class="container bg-light" style="min-height:100vh">
		<div class="mx-auto " style="width: 70%;">
			<p class="text-center mt-5" style="font-size: 30px; font-weight: bold; color: #fc825a">Events</p>
			<p class="text-center">
				It is important to carry out a good follow-up marketing of alumni events.
				With over 100 worldwide events in a year, you have a wealth of alumni networking opportunities.
			</p>
		</div>
		<?php
		if (isset($_SESSION["events"])) {
			foreach ($_SESSION["events"] as $ev) {
				$day = date('d', strtotime($ev['date']));
				$month = strtoupper(date('F', strtotime($ev['date'])));
				echo '
				<div class="row justify-content-between py-3 mt-5" style="background-color: white;">
					<div class="col my-auto text-center">
						<span style="font-size: 30px; font-weight: bold; color: #c55e76;">' . $day . '</span> <br>
						<span style="font-size: 20px; font-weight: bold; color: #fc825a;">' . $month . '</span>
					</div>
					<div class="col my-auto text-start">
						<span style="font-size: 20px; font-weight: bold;">' . $ev['title'] . '</span> <br>
						<span style="color: gray;">' . $ev['description'] . '</span>
					</div>
					<div class="col m-auto">
						<button class="btn bg-danger text-light" id="btn' . $ev['id'] . '" onClick="showDetails(' . $ev['id'] . ')">Details</button>
					</div>
					<div class="d-none justify-content-center" style="border-top:1px solid black;" id="' . $ev['id'] . '">
						<table class="mx-auto"">
							<tr>
								<th>Title : </th>
								<td>' . $ev['title'] . '</td>
							</tr>
							<tr>
								<th>Location : </th>
								<td>' . $ev['location'] . '</td>
							</tr>
							<tr>
								<th>Event date : </th>
								<td>' . $ev['date'] . '</td>
							</tr>
							<tr>
								<th>Time : </th>
								<td>' . $ev['time'] . '</td>
							</tr>
							<tr>
								<th>Description : </th>
								<td>' . $ev['description'] . '</td>
							</tr>
						</table>
					</div>
				</div>';
			}
		}
		?>
	</div>
	<?php include '../../common/footer.php'; ?>
</body>
<script>
	var lastId=-1;
	function updatePrevious(id){
		if(lastId===-1 || lastId===id){
			lastId = id;return;
		}
		const show = document.getElementById(lastId);
		lastId = "btn"+lastId;
		const btn = document.getElementById(lastId);
		if(btn.innerText!=='Details'){
			btn.innerText = 'Details';	
			show.classList.toggle('d-none');
		}
		lastId = id;	
	}
	function showDetails(id){
		updatePrevious(id);
		const show = document.getElementById(id);
		show.classList.toggle('d-none');
		id = "btn"+id;
		const btn = document.getElementById(id);
		btn.innerText = (btn.innerText==='Details'?'Hide':'Details');
	}
</script>

</html>