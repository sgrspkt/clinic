<div class="mc_embed_signup">
<form method="post" action="index.php?controller=Admin&task=insertTime" enctype="multipart/form-data">
	<input type="hidden" name="id">

	<label> Doctor </label>
  <select id="doctor" name="doctor">
    <option> Choose your doctor </option>
      <?php
         foreach ($data as $row) {
      ?>
        <option value="<?php echo $row['doc_id'];?>"><?php echo $row['name'];?></option>
      <?php
         }
      ?>
    </select>

		<label> Choose Time </label>
		<?php
		foreach ($res as $data) {
			?>

			<div class="form-group">

			<label> <input type="checkbox" name="timeslot[]" class="form-control" value="<?php echo $data['timeslot_id'];?>"> <?php echo $data['timeslot'];?></label>

			</div>
			<?php
		}
		?>

	<label> </label>



	<label><button name="submit"> Submit</button> </label>
</form>
</div>
