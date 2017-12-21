<!DOCTYPE HTML>
<html>
	<head>
		<title>Clinical Appointment</title>
		<link href="template/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="template/css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="template/js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 2500,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
		<!---start-wrap---->
			<!---start-header---->
					<div class="top-nav">
						<div class="wrap">
							<ul>
								<li class="active"><a href="index.php?controller=User&task=indexPage">Home</a></li>
								<li> <a href="index.php?controller=User&task=doctorPage">Doctors </a> </li>
								<li><a href="index.php?controller=User&task=aboutPage">About Us</a></li>
								<li><a href="index.php?controller=User&task=contactPage">Contact </a></li>
								<li><a href="index.php?controller=User&task=helpPage">Help</a></li>
								<div class="clear"> </div>
							</ul>
						</div>
						<div class="clear"> </div>
					</div>
			<div class="clear"> </div>
			<!---End-header---->
			<!---start-images-slider---->
			<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides rslides1" id="slider1" style="max-width: 2500px;">
					      <li id="rslides1_s0" class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; -webkit-transition: opacity 600ms ease-in-out; transition: opacity 600ms ease-in-out;">
					      	<img src="template/images/slider3.png" alt="image">
					      	<div class="slider-info">
					      		<p>Welcome </p>
					      		<span>We provide you the best medical services. </span>

					      	</div>
					      </li>
					      <li id="rslides1_s1" class="" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; -webkit-transition: opacity 600ms ease-in-out; transition: opacity 600ms ease-in-out;">
									<img src="template/images/slider2.png" alt="image">
					      	<div class="slider-info">
					      		<p>Welcome</p>
					      		<span>We provide you the best medical services. </span>

					      	</div>
					      </li>
					      <li id="rslides1_s2" class="rslides1_on" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; -webkit-transition: opacity 600ms ease-in-out; transition: opacity 600ms ease-in-out;">
									<img src="template/images/slider2.png" alt="image">
					      	<div class="slider-info">
					      		<p>Welcome</p>
					      		<span>We provide you the best medical services.</span>

					      	</div>
					      </li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
			<!---End-images-slider---->
			<!----start-content----->
			<div class="content">
				<div class="content-top-grids">
					<div class="wrap">
						<div class="content-top-grid">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="template/images/timer.png" title="image-name" /></a>
								</div>
								<div class="content-top-grid-title">
									<h3 style="font-size:20px;">24x7</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>We serve you 24 hours appointment scheduling services.</p>

								<div class="clear"> </div>
						</div>
						<div class="content-top-grid">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="template/images/tool.png" title="image-name" /></a>
								</div>
								<div class="content-top-grid-title">
									<h3 style="font-size:20px;">Care Advices </h3>
								</div>
								<div class="clear"> </div>
								<p> We provide you the best care and facilities services with the best consultant. </p>

							</div>

								<div class="clear"> </div>
						</div>
						<div class="content-top-grid">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="template/images/inject.png" title="image-name" /></a>
								</div>
								<div class="content-top-grid-title">
									<h3 style="font-size:20px;">Emergency</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>In case of Emergency you can directy have a visit and consult with the doctor.</p>

								<div class="clear"> </div>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="clear"> </div>
				<div class="boxs">
					<div class="wrap">
						<div class="section group">
							<div class="grid_1_of_3 images_1_of_3">
								  <h3>WELCOME!</h3>
								  <span> Have a Visit </span>
									<p> We heartly welcome you to our clinic.For more details visit our About us page </p>
									<div class="button"><span><a href="index.php?controller=User&task=aboutPage">About Us</a></span></div>
							</div>

							<div class="grid_1_of_3 images_1_of_3">
								  <h3>CONTACT  US</h3>
								  <span>Any Queries?</span>
								  <p> Please visit our Contact Us page and if you have any queries simply let us know there.</p>
									<div class="button"><span><a href="index.php?controller=User&task=contactPage">Contact Us</a></span></div>
							</div>

							<div class="grid_1_of_3 images_1_of_3">
								  <h3>Other Facilities</h3>
								  <ul>
								  	<li><a href="#">E-Appointment</a></li>
								  </ul>

							</div>
						</div>
					</div>
					</div>
			<!----End-content----->
		</div>
		<!---End-wrap---->
		<!---start-footer---->

		<!---End-footer---->
	</body>
</html>
