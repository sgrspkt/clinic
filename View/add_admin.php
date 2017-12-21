
<div class="mc_embed_signup">
	<form method="post" action="index.php?controller=Admin&task=insertAdmin" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $model->getValue("admin_id") ;?>">
		<label> Name </label><input type="text" name="name" placeholder="Full Name" required="" value="<?php echo $model->getValue("name");?>">

			<label>Mobile No.</label><input type="text" name="mobile" placeholder="Mobile Number" required="" value="<?php echo $model->getValue("mobile") ;?>">
			<label>Email</label><input type="email" name="email" placeholder="Email" required="" value="<?php echo $model->getValue("email") ;?>">
			<label>Password</label><input type="password" name="password" placeholder="Password" required="" value="<?php echo $model->getValue("password") ;?>">

			<label><button name="submit"> Submit</button> </label>
		</form>
	</div>
