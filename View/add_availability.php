<div class="mc_embed_signup">
<form method="post" action="index.php?controller=Admin&task=insertAvailability" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

	<label> Doctor </label>
  <select id="doctor" name="doctor" value="<?php echo  $model->getValue("doc");?>">
    <option> Choose your doctor </option>
      <?php
         foreach ($data as $row) {
      ?>
        <option value="<?php echo $row['doc_id'];?>"><?php echo $row['name'];?></option>
      <?php
         }
      ?>
    </select>

	<label>Day</label>
	<?php
	$day = $model->getValue("day");
	?>
	<select id="day" name="day">
		<option> Choose  Day </option>
			 <option <?php echo ($day =='Sunday')?"selected":""?>>Sunday</option>
       <option <?php echo ($day =='Monday')?"selected":""?>>Monday</option>
			 <option <?php echo ($day =='Tuesday')?"selected":""?>>Tuesday</option>
			 <option <?php echo ($day =='Wednesday')?"selected":""?>>Wednesday</option>
			 <option <?php echo ($day =='Thursday')?"selected":""?>>Thursday</option>
			 <option <?php echo ($day =='Friday')?"selected":""?>>Friday</option>
			 <option <?php echo ($day =='Saturday')?"selected":""?>>Saturday</option>
	</select>

	<label>Start Time:</label><input type="time" name="start_time" placeholder="Start Time" required="" value="<?php echo  $model->getValue("start_time");?>"> </label>
	<label>End Time:</label><input type="time" name="end_time" placeholder="End Time" required="" value="<?php echo  $model->getValue("end_time");?>"> </label>
	<?php if(!$_GET['id']){  ?>
	<label><button name="submit"> Submit</button> </label>
	<?php } else { ?>
	<label><button name="update" value="update">Update</button></label><?php } ?>
</form>
</div>
