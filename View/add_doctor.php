
<div class="mc_embed_signup">
	<form method="post" action="index.php?controller=Admin&task=insertDoc" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $model->getValue("doc_id") ;?>">
		<label> Name </label><input type="text" name="name" pattern="[a-zA-Z\s]+" title="Alphabets only" placeholder="Full Name" required="" value="<?php echo $model->getValue("name");?>">
		<?php
		$gender = $model->getValue("gender");
		?>
		<label> Gender:
			Male
			<input type="radio" name= "gender" value="male" <?php echo $gender=="male"?'checked="checked"':'';?> />
			Female
			<input type="radio" name= "gender" value="female"  <?php echo $gender=="female"?'checked="checked"':'';?>  </label>
			<label>Address</label><input type="text" name="address"  placeholder="Address" pattern="[a-zA-Z\s]+"  title="Alphabets only" required="" value="<?php echo $model->getValue("address") ;?>">
			<label>Mobile No.</label><input type="text" name="mobile_no" placeholder="Mobile Number" required="" value="<?php echo $model->getValue("mobile_no") ;?>">
			<label>Email</label><input type="email" name="email" placeholder="Email" required="" title="Valid email" value="<?php echo $model->getValue("email") ;?>">
			<label>Specialist</label><input type="text" name="specialist" placeholder="Specialist" title="Alphabets Only" pattern="[a-zA-Z\s]+" required="" value="<?php echo $model->getValue("specialist") ;?>">
			<label>Photo</label><input type="file" name="img" value="<?php echo $model->getValue("img");?>">
			<label><button name="submit"> Submit</button> </label>
		</form>
	</div>
