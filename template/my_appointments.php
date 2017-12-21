<!DOCTYPE HTML>
<html>
<head>
	<title>My Appointments</title>
</head>
<body>
	<!---start-wrap---->
	<!---start-header---->
	<div class="clear"> </div>
	<div class="top-nav">
		<div class="wrap">
			<ul>
				<li> <a href="index.php?controller=Patient&task=selectDoc"> Doctors </a> <li>
					<li><a href="index.php?controller=Patient&task=addAppointment">Make an Appointment</a> </li>
					<li class="active"><a href="index.php?controller=Patient&task=viewApp">My Appointments </a> </li>
					<li><a href="index.php?controller=Patient&task=contactPage">Contact </a></li>
					<li><a href="index.php?controller=Patient&task=helpPage">Help</a></li>
					<div class="clear"> </div>
				</ul>
			</div>
		</div>

		<!---End-header---->
		<!----start-content----->
		<?php if(isset($_SESSION['success'])){
			echo $_SESSION['success'];
		} ?>

		<div class="content">
			<div class="wrap" style="overflow-x:auto;">
				<h1 style="text-align:center"> MY APPOINTMENTS </h1>
				<table style="border: 3px solid black; margin-left:200px; ">
					<tr style="border:2px solid black; padding: 8px;">
						<th style="border:3px solid black;  padding: 9px;">Name</th>
						<th style="border:3px solid black;  padding: 9px;">Doctor</th>
						<th style="border:3px solid black;  padding: 9px;">Scheduled Date</th>
						<th style="border:3px solid black;  padding: 9px;">Scheduled Time</th>
						<th style="border:3px solid black;  padding: 9px;">Problem</th>
						<th style="border:3px solid black;  padding: 9px;"> Status </th>
					</tr>
					<?php
					for ($i=0; $i < count($data) ; ++$i) {
						$row=$data[$i];
						?>
						<tr>
							<td style="border: 2px solid black;  padding: 9px;"><?php echo $row['pat_name']?></td>
							<td style="border:2px solid black;  padding: 9px;"><?php echo $row['name']?></td>
							<td style="border:2px solid black;  padding: 9px;"><?php echo $row['scheduled_date']?></td>
							<td style="border:2px solid black;  padding: 9px;"><?php echo $row['scheduled_time']?></td>
							<td style="border:2px solid black;  padding: 9px;"><?php echo $row['problem']?></td>
							<td style="border:2px solid black;  padding: 9px;"><?php if($row['confirm'] == 1){ echo 'Approved By Admin';}else{ echo 'Approval Pending'; } ?> </td>

							</tr>
						<?php	}?>
					</table>
				</div>
					<div class="clear"> </div>
				</div>
				<div class="clear"> </div>
				<!---End-wrap---->
			</div>

			<!---start-footer---->

			<!---End-footer---->
		</body>
		</html>
