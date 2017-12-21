<div class="mc_embed_signup">
<form action="index.php?controller=appointment&task=insertAppointmentAdmin" method="post">
	<input type="hidden" name="id">

<label> Name </label>
	<input type="text" name="pat_name" placeholder="Patient Name" required="">

<label> Choose Doctor </label>
<select id="setDocName" name="doc_id">
	<option value=""> Choose your doctor </option>
	<?php

	foreach ($data as $row) {
		?>
		<option value="<?php echo $row['doc_id'];?>"><?php echo $row['name'];?></option>
		<?php
	}
	?>
</select>

<label> Choose Date </label>
<input type="date" id="userSelectedDate" type="text" name="scheduled_date" required="">

<label> Time </label>
<select id="time" name="scheduled_time">
	<option value=""> Choose your time </option>
	<?php

	foreach ($res as $data) {
		?>
		<option value="<?php echo $data['id'];?>"><?php echo $data['timeslot'];?></option>
		<?php
	}
	?>
</select>

<label> Phone No. </label>
<input type="text" name="mobile_no" placeholder="Patient's Phone Number" required="">

<label> Email </label>
<input type="email" name="email" placeholder="Patient's Email" required="">

<label> Problem </label>
<textarea name="problem" placeholder="Reason for visit" required=""> </textarea>


<label><input type="submit" value="Add Appointment"> </label>
</form>


<script>



	//http://localhost/clinic/index.php?controller=Admin&task=testDoc

</script>

</body>
</html>
