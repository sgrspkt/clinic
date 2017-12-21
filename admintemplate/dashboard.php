<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Admin</title>
</head>
<body>

			<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" class="well span3 top-block" href="index.php?controller=Admin&task=addDocForm">
					<span class="icon32 icon-red icon-user"></span>
					<div>Add Doctors</div>


				</a>

				<a data-rel="tooltip" class="well span3 top-block" href="index.php?controller=Admin&task=index">
					<span class="icon32 icon-red icon-user"></span>
					<div>View Doctors</div>
				</a>

				<a data-rel="tooltip" class="well span3 top-block" href="index.php?controller=Admin&task=viewPat">
					<span class="icon32 icon-red icon-user"></span>
					<div>View Patients</div>
				</a>
				<a data-rel="tooltip" class="well span3 top-block" href="index.php?controller=Admin&task=viewApp">
					<span class="icon32 icon-red icon-user"></span>
					<div>View Appointments</div>
				</a>
			</div>
		<hr>

	</div><!--/.fluid-container-->
</body>
</html>
