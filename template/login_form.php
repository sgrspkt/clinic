
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
	<div class="top-nav">
		<div class="wrap">
			<ul>
				<li><a href="#"> PATIENT LOGIN</a> </li>
				<div class="clear"> </div>
			</ul>
		</div>
	</div>

	<div class="content">
		<div class="wrap">

			<div class="col span_2_of_3">
				<h1 style="text-align:center;">Login to Your Account!</h1>
			<div class="contact-form">
				<form action="index.php?controller=User&task=loginUser" method="post">
          <div>
						<span> <label> Enter Username </label></span>
					<span> <input type="text" name="username" placeholder="Username" required=""> <span>
				</div>

          <div>
						<span> <label> Enter Password  </label> </span>
					<span><input type="password" name="password" placeholder="Password" required=""></span>
				</div>

				<div class="clear"> </div>
				<span><input type="submit" value="Login"></span>
			</form>
		</div>
	</div>
	<div class="clear"> </div>
</div>
<div class="clear"> </div>
</div>

</body>
</html>
