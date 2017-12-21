
<!DOCTYPE html>
<html>
<head>
	<title>Make Appointment</title>
</head>
<body>

	<div class="clear"> </div>
	<div class="top-nav">
		<div class="wrap">
			<ul>
				<li> <a href="index.php?controller=Patient&task=selectDoc"> Doctors </a> <li>
					<li class="active"><a href="index.php?controller=Patient&task=addAppointment">Make an Appointment</a> </li>
					<li><a href="index.php?controller=Patient&task=viewApp">My Appointments </a> </li>
					<li><a href="index.php?controller=Patient&task=contactPage">Contact </a></li>
					<li><a href="index.php?controller=Patient&task=helpPage">Help</a></li>
					<div class="clear"> </div>
				</ul>
			</div>
		</div>
	</div>


	<div class="content">
		<div class="wrap">
			<div class="col span_2_of_3">
				<h1 style="text-align:center;">Request An Appointment </h1>
				<div class="contact-form">
					<form action="index.php?controller=Appointment&task=insertAppointment" method="post">
            <input type="hidden" name="doc_id" value="<?php $_POST['name'] ?>">
						<input type="hidden" name="doc_date" value="<?php $_POST['scheduled_date'] ?>">
            <div>
              <span> <label> Patient Name </label> </span>
              <span><input type="text" name="pat_name" placeholder="Patient Name" required=""> </label>
              </div>

            <div>
              <span> <label> Time</label>  </span>
              <span> <select id="time" name="scheduled_time">
                <option> Choose your time </option>
									<!-- <?php
									$startTime = '14:00:00';
									$endTime = '16:00:00';
									$addedMinutes = '+15 minutes';
									// while(strtotime($startTime) <= strtotime($endTime)) {
									$startTime = date('h:i:s',strtotime($startTime . ' +15 minutes'));
									?>
                  <option value=""><?php echo $startTime; ?> </option> -->
              </select> </span>
            </div>


            <div>
              <span><label> Phone No. </label> </span>
              <span><input type="text" name="mobile_no" placeholder="Patient's Phone Number" required=""> </span>
            </div>

            <div>
              <span> <label> Email </label> </span>
            <span>	<input type="email" name="email" placeholder="Patient's Email" required=""> </span>
            </div>

            <div>
              <span> <label> Problem </label> </span>
              <span><textarea name="problem" placeholder="Reason for visit" required=""> </textarea> </span>
            </div>

            <span><input type="submit" value="Request an Appointment"> </span>
          </form>
        </div>

      </div>
      <div class="clear"> </div>
      </div>
      <div class="clear"> </div>
      </div>





	</body>
	</html>
