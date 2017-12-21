
<!DOCTYPE HTML>
<html>
	<head>
		<title>Doctors</title>
	</head>
	<body>
		<!---start-wrap---->

			<!---start-header---->
					<div class="top-nav">
						<div class="wrap">
							<ul>
								<li><a href="index.php?controller=User&task=indexPage">Home</a></li>
								<li class="active"> <a href="index.php?controller=User&task=doctorPage">Doctors </a> </li>
								<li><a href="index.php?controller=User&task=aboutPage">About Us</a></li>
								<li><a href="index.php?controller=User&task=contactPage">Contact </a></li>
								<li><a href="index.php?controller=User&task=helpPage">Help</a></li>
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
			</div>
			<!---End-header---->

			<!----start-content----->
			<div class="content">
				<div class="wrap">
					<h1 style="font-family:'Open Sans', sans-serif; text-align:center">OUR DOCTORS </h1>
					<?php
					foreach ( $data as $row) {
						?>
						<div style=" margin-left:auto; margin-right:auto; display:inline-block; float:left; padding:50px;">
						<p><?php echo "<img src='View/Pictures/".$row['img']."' height='250px' width='250px'>" ?> </p>
						<p style="text-align:center"><h2> Dr. <?php echo $row['name'] ?></h2> </p>
						<p style="text-align:center" > <?php echo $row['specialist']; ?></p>
						<!-- <p style="text-align:center"> <?php echo $row['day']; ?> </p>
						<p style="text-align:center"> Available Time:<?php echo $row['duration']?></p> -->
						 <p style="text-align:center"><?php echo "<a href='index.php?controller=User&task=loginPage'> Make Appointment </a>"
						?></p> </div>	 <?php
				 }
				 ?>

				<!---End-content----->
				<div class="clear"> </div>
			</div>
		</div>
		<!---End-wrap---->
	</div>
	<div class="clear"> </div>
			</body>
			</html>
