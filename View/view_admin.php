<?php
// session_start();
// if($_SESSION['success']){
//   echo $_SESSION['success'];
//   session_unset($_SESSION['success']);
// }
echo '
<html>
<head>
<title> </title>
</head>

<body>

<table class="table table-striped table-bordered bootstrap-datatable datatable">

<tr>
<th>Admin_id </th>
<th>Name</th>
<th>Mobile_no</th>
<th>Email</th>
</tr>';

for ($i=0; $i <count($data) ; ++$i) {
  $row=$data[$i];
  echo"
  <tr>
  <td>".$row['admin_id']."</td>
  <td>".$row['name']."</td>
  <td>".$row['mobile_no']."</td>
  <td>".$row['email']."</td>
  <td> <a href='index.php?controller=Admin&task=updateAdmin&id=".$row['admin_id']."'><button > Update </button></a>
  <a href='index.php?controller=Admin&task=deleteAdmin&id=".$row['admin_id']."'><button>Delete </button> </a>

  </tr>";
}
echo "
</table>
</body>
</html>
";
?>
