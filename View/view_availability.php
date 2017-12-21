<?php
echo '
<html>
<head>
<title> </title>
</head>

<body>

<table class="table table-striped table-bordered bootstrap-datatable datatable">

<tr>
<th>Avail_id</th>
<th>Name</th>
<th>Day</th>
<th>Start_time</th>
<th>End_time</th>
<th>Action </th>
</tr>';

for ($i=0; $i <count($data) ; ++$i) {
  $row=$data[$i];
  echo"
  <tr>
  <td>".$row['avail_id']."</td>
  <td>".$row['name']."</td>
  <td>".$row['day']."</td>
  <td>".$row['start_time']."</td>
  <td>".$row['end_time']."</td>
  <td> <a href='index.php?controller=Admin&task=updateAvail&id=".$row['avail_id']."'><button > Update </button></a>
  <a href='index.php?controller=Admin&task=deleteAvailability&id=".$row['avail_id']."'><button>Delete </button> </a>

  </tr>";
}
echo "
</table>
</body>
</html>
";
?>
