<html>
<head>
<title> </title>
</head>
<body>
<table class="table table-striped table-bordered bootstrap-datatable datatable">

  <tr>
    <th>App_id</th>
    <th>Patient</th>
    <th>Doctor</th>
    <th>Scheduled_date</th>
    <th>Scheduled_time</th>
    <th>Mobile_no</th>
    <th>Email</th>
    <th>Problem</th>
    <th>Action</th>
  </tr>

  <?php
for ($i=0; $i <count($data) ; ++$i):
  $row=$data[$i];
  ?>

  <tr>
  <td><?php echo $row['app_id'] ?></td>
  <td><?php echo $row['pat_name'] ?></td>
  <td><?php echo $row['name'] ?></td>
  <td><?php echo $row['scheduled_date'] ?></td>
  <td><?php echo $row['scheduled_time'] ?></td>
  <td><?php echo $row['mobile_no'] ?></td>
  <td><?php echo $row['email'] ?></td>
  <td><?php echo $row['problem'] ?></td>

  <?php if($row['confirm'] == 0): ?>
         <td><a href="index.php?controller=Appointment&task=conAppMail&id=<?php echo $row['app_id']; ?>"><button class="btn btn-info" onclick="return confirm('Would you like to confirm it?')">Confirm? </button> </a>
         <a href="index.php?controller=Appointment&task=delApp&id=<?php echo $row['app_id']; ?>"><button class="btn btn-danger" onclick="return confirm('Would you like to delete it?')">Cancel </button> </a> </td>

  <?php else: ?>
        <td><button class="btn btn-success">Confirmed</button>
        <a href="index.php?controller=Appointment&task=delApp&id=<?php echo $row['app_id']; ?>"><button class="btn btn-danger" onclick="return confirm('Would you like to delete it?')">Delete </button> </a></td>
  <?php endif; ?>
  </tr>

<?php endfor; ?>

</table>
</body>
</html>
