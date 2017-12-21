
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<body>
		<div class="top-nav">
			<div class="wrap">
				<ul>
					<li><a href="#"> PATIENT SIGN UP </a> </li>
					<div class="clear"> </div>
				</ul>
			</div>
		</div>

		<div class="content">
			<div class="wrap">


				<div class="col span_2_of_3">
					<h1 style="text-align:center;"> Create Your Account!</h1>
					<div class="contact-form">
						<form action="index.php?controller=User&task=insertPatient" method="post">
							<input type="hidden" name="id" >

							<div>
								<span> <label> Full Name </label> </span>
								<span><input type="text" name="name" placeholder="Your Full Name" id="name" pattern="[a-zA-Z\s]+"  title="Only Alphabets accepted" required=""></span>
							</div>

							<div>
								<span> <label> Address </label> </span>
								<span> <input type="text" name="address" placeholder="Your Address" id="address" pattern="[a-zA-Z\s]+"  title="Alphabets only accepted" required=""> </span>
							</div>

							<div>
								<span> <label> Gender</label> </span>
								<span> <select name="gender" id="gender">
									<option>Choose Your Gender</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</span>
						</div>

						<div>
							<span> <label> Date of Birth </label> </span>
							<span><input type="date" name="dob" id="date" required=""> </span>
						</div>

						<div>
							<span> <label> Mobile No. </label> </span>
							<span><input type="text" name="mobile_no" placeholder="Your Mobile no."  id="mobile_no" title="Mobile number with ten digits" required=""></span>
						</div>

						<script type="text/javascript">
						function validatePhone()
						{
							var mobile = document.getElementById('mobile_no');

					}

						</script>

						<div>
							<span> <label> Email  </label> </span>
							<span><input type="email" name="email" placeholder="Your Email" id="email" title="Valid email" required=""> </span>

						</div>

						<div>
							<span> <label> Username </label> </span>
							<span><div><input type="text" name="username" placeholder="Your Username"   id="username" pattern="[a-z0-9-]{1,10}" title="Username may contain alphabets and umber and must not exceed 10 letters" required=""></div> </span>
						</div>

						<div>
							<span> <label>Password </label> </span>
							<span><input type="password" name="password" placeholder="Password" id="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password should have minimum 8 charachetrs with uppercase lowercase letters and special charaters" required=""></span>
						</div>

						<div>
							<span> <label> Confirm Password</label>  </span>
							<span><input type="password" name="password1" placeholder="Confirm Password" required=""  id="password1" onkeyup="checkPass(); return false;" > </span>
						</div>

						<span id="confirmMessage" class="confirmMessage"></span>

						<script language="javascript" type="text/javascript">
						function checkPass()
						{
							//Store the password field objects into variables ...
							var password = document.getElementById('password');
							var password1 = document.getElementById('password1');
							//Store the Confimation Message Object ...
							var message = document.getElementById('confirmMessage');
							//Set the colors we will be using ...
							var goodColor = "#66cc66";
							var badColor = "#ff6666";
							//Compare the values in the password field
							//and the confirmation field
							if(password.value == password1.value){
								//The passwords match.
								//Set the color to the good color and inform
								//the user that they have entered the correct password
								password1.style.backgroundColor = goodColor;
								message.style.color = goodColor;
								message.innerHTML = "Passwords Match!"
							}else{
								//The passwords do not match.
								//Set the color to the bad color and
								//notify the user.
								password1.style.backgroundColor = badColor;
								message.style.color = badColor;
								message.innerHTML = "Passwords Do Not Match!"
							}
						}
						</script>
						<span><input type="submit" value="Sign Up"> </span>
					</form>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
		</div>

	</body>
	</html>
