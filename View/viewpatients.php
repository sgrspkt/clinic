<?php
echo '
<html>
<head>
<title> </title>
</head>

<body>

<table class="table table-striped table-bordered bootstrap-datatable datatable">

<tr>
<th>Pat_id </th>
<th>Name</th>
<th>Address</th>
<th>Gender</th>
<th>DOB</th>
<th>Mobile_no</th>
<th>Email</th>
<th> Action </th>
</tr>';

for ($i=0; $i <count($data) ; ++$i) {
  $row=$data[$i];
  echo"
  <tr>
  <td>".$row['pat_id']."</td>
  <td>".$row['name']."</td>
  <td>".$row['address']."</td>
  <td>".$row['gender']."</td>
  <td>".$row['dob']."</td>
  <td>".$row['mobile_no']."</td>
  <td>".$row['email']."</td>

  <td> <a href='index.php?controller=Admin&task=deletePat&id=".$row['pat_id']."'><button>Delete </button> </a>

  </tr>";
}
echo "
</table>


</body>
</html>
";
?>
