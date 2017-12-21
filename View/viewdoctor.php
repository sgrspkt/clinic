<?php
echo '
<html>
<head>
<title> </title>
</head>

<body>

<table class="table table-striped table-bordered bootstrap-datatable datatable">

<tr>
<th> Doc_id </th>
<th>Name</th>
<th>Gender</th>
<th>Address</th>
<th>Mobile_no</th>
<th>Email</th>
<th>Specialist</th>
<th>Image</th>
<th> Action </th>
</tr>';

for ($i=0; $i <count($data) ; ++$i) {
  $row=$data[$i];
  echo"
  <tr>
  <td>".$row['doc_id']."</td>
  <td>".$row['name']."</td>
  <td>".$row['gender']."</td>
  <td>".$row['address']."</td>
  <td>".$row['mobile_no']."</td>
  <td>".$row['email']."</td>
  <td>".$row['specialist']."</td>
  <td><img src='View/Pictures/".$row['img']."' height='200px' width='200px'></td>
  <td> <a href='index.php?controller=Admin&task=updateForm&id=".$row['doc_id']."'><button> Update </button></a>
  <a href='index.php?controller=Admin&task=deleteDoc&id=".$row['doc_id']."'><button>Delete </button> </a>

  </tr>";
}
echo "
</table>
</body>
</html>
";
?>
