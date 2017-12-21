
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

	<div class="col span_2_of_3">
			<div class="contact-form">
				<form action="index.php?controller=appointment&task=insertAppointmentClient" method="post">
					<input type="hidden" name="id">

					<div>
						<span><label> Name </label></span>
						<span><input type="text" name="pat_name" placeholder="Patient Name" required=""></span>
					</div>

					<div>
						<span><label> Choose Doctor </label></span>
						<select id="setDocName" name="doc_id">
							<span><option value=""> Choose your doctor </option></span>
							<?php

							foreach ($data as $row) {
								?>
								<option value="<?php echo $row['doc_id'];?>"><?php echo $row['name'];?></option>
								<?php
							}
							?>
						</select>
					</div>

					<div>
						<span><label> Choose Date </label></span>
						<span><input type="date" id="userSelectedDate" type="text" name="scheduled_date" required=""></span>
					</div>

					<div>
						<span><label> Time </label></span>
						<select id="time" name="scheduled_time">
							<span><option value=""> Choose your time </option></span>
							<?php

							foreach ($res as $data) {
								?>
								<option value="<?php echo $data['id'];?>"><?php echo $data['timeslot'];?></option>
								<?php
							}
							?>
						</select>
					</div>

					<div>
						<span><label> Phone No. </label></span>
						<span><input type="text" name="mobile_no" placeholder="Patient's Phone Number" required=""></span>
					</div>
					<div>
						<span><label> Email </label></span>
						<span><input type="email" name="email" placeholder="Patient's Email" required=""></span>
					</div>
					<div>
						<span><label> Problem </label></span>
						<span><textarea name="problem" placeholder="Reason for visit" required=""> </textarea></span>
					</div>

					<div>
						<span><label><input type="submit" value="Add Appointment"> </label></span>
					</div>

				</form>
			</div>
				<div class="clear"> </div>
		</div>
		<div class="clear"> </div>

				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script>
				/*
				* Default value
				* --------------
				* @method POST
				*
				*/
				var xhr = "";

				function sendAjax(options, cb) {

					var method = (typeof options.method !== typeof undefined) ? options.method : "POST",
					userBeforeSend = (typeof options.beforeSend === "function") ? options.beforeSend : "";

					xhr = $.ajax({
						url: options.url,
						data: (typeof options.data !== typeof undefined) ? options.data : "",
						method: method,
						statusCode: {
							401: function() {
								console.warn("Authentication credentials problem occured!! For more information, please contact support.");
							},
							403: function() {
								console.warn('403 Error!! For more information, please contact support.');
							},
							404: function() {
								console.warn('404 Error!! For more information, please contact support.');
							},
							400: function() {
								console.warn('400 Error!! For more information, please contact support.');
							},
							500: function() {
								console.warn('500 Error!! For more information, please contact support.');
							}
						},

						error: function(jaXHR, textStatus, errorThrown) {
							console.warn(errorThrown + " " + textStatus + " " + "For more information, please contact support.");
						},

						success: function(data, textStatus, jqXHR) {

							if (cb && typeof cb !== "string" && typeof cb === "function") {
								return cb(data);
							}
							return data;

						}

					});
				}



				$(document).on('change',"#setDocName", function(e){

					// console.log($(this).val());
					// return ;

					var options = {
						method: "get",
						url: "/clinic/index.php?controller=Api&task=selectDoc&doc_id="+$(this).val(),

					}

					sendAjax(options, function(response){

						var temp_res = {};
						temp_res = response;


						$(document).on("change","#userSelectedDate", function(e){
							var cur_doc =  {};
							cur_doc.doc_info = temp_res;
							cur_doc.selected_date = this.value

							var options = {
								method: "post",
								url: "/clinic/index.php?controller=Api&task=fixAppoinment",
								data: cur_doc
							}

							sendAjax(options, function(response){
								var times = JSON.parse(response),
								i = 0,
								total_time_length = Object.keys(JSON.parse(response)).length;

								$("#time").html("");

								if(typeof times.error !== typeof undefined) {
									$("#time").css("border","1px solid red").
									append("<option>"+times.error+"</option>");
								} else {
									for(; i < total_time_length; i++) {
										if(typeof times[i] !== typeof undefined) {
											$("#time").css("border","")
											.append("<option>"+times[i]+"</option>");
										}

									}
								}
							});

						});
					});

				});

				</script>


			</body>
			</html>
