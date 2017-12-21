
<!DOCTYPE HTML>
<html>
	<head>
		<title>Contact Us</title>
	</head>
	<body>
		<!---start-wrap---->
			<!---start-header---->

					<div class="top-nav">
						<div class="wrap">
							<ul>
								  <li> <a href="index.php?controller=Patient&task=selectDoc"> Doctors </a> <li>
									<li><a href="index.php?controller=Patient&task=addAppointment">Make an Appointment</a> </li>
									<li><a href="index.php?controller=Patient&task=viewApp">My Appointments </a> </li>
									<li class="active"><a href="index.php?controller=Patient&task=contactPage">Contact </a></li>
									<li><a href="index.php?controller=Patient&task=helpPage">Help</a></li>
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
			</div>
			<!---End-header---->

			<!----start-content----->
			<div class="content">
				<div class="wrap">
					<!---start-contact---->
					<div class="contact">
						<div class="section group">
				<div class="col span_1_of_3">

      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>Name</p>
						   		<p>Address</p>
						   		<p>Nepal</p>
				   		<p>Phone:+9813112266</p>

				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				</div>
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
						<form action="index.php?controller=Contact&task=insertContactPatient" method="post">
							<div>
								<span><label>NAME</label></span>
								<span><input type="text" name= "name"></span>
							</div>
							<div>
								<span><label>E-MAIL</label></span>
								<span><input type="email" name="email"></span>
							</div>
							<div>
								<span><label>MOBILE.NO</label></span>
								<span><input type="text" name="mobile_no"></span>
							</div>
							<div>
								<span><label>SUBJECT</label></span>
								<span><textarea name="subject"> </textarea></span>
							</div>
						 <div>
								<span><input type="submit" value="Submit"></span>
						</div>
					    </form>
				    </div>
  				</div>
			  </div>
					</div>
					<!---End-contact---->
				<div class="clear"> </div>
				</div>
			<!----End-content----->
		</div>
		<!---End-wrap---->

		<!---start-footer---->

		<!---End-footer---->
	</body>
</html>
