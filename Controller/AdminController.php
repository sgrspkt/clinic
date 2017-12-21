<?php
namespace Controller;

use Model\Doctor as Doc;

session_start();

class AdminController
{
  //Admin Dashboard

  public function __construct() {

    if(!$_SESSION['admin_id'])
    {
      header("location: index.php?controller=Login&task=callLoginForm");
    }
  }

  public function dashBoard()
  {

    require_once('admintemplate/dashboard.php');
  }

  /* View  all Doctors info */
  public function index()
  {
    $model = new \Model\Doctor();
    $data= $model->selectAll();

    require_once('View/viewdoctor.php');
  }

  /* Insert Doctor */
  public function addDocForm()
  {
    $model= new \Model\Doctor();
    require_once('View/add_doctor.php');
  }

  public function insertDoc()
  {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $mobile_no=$_POST['mobile_no'];
    $email=$_POST['email'];
    $specialist=$_POST['specialist'];
    $file_name = $_FILES['img']['name'];
    $path= "View/Pictures/".$file_name;
    $file_type= pathinfo($file_name, PATHINFO_EXTENSION);
    $file_path= '';
    if($file_type=='png' || $file_type=='jpg' ||  $file_type=='gif') {
      $random_id = uniqid(rand(), true);
      $new_file_name="picture_".$random_id.".".$file_type;
      $file_path = "View/Pictures/".$new_file_name;
      move_uploaded_file($_FILES['img']['tmp_name'], $file_path);
    }
    $model= new \Model\Doctor();
    $model->setValue('doc_id',$id);
    $model->setValue('name',$name);
    $model->setValue('gender',$gender);
    $model->setValue('address',$address);
    $model->setValue('mobile_no',$mobile_no);
    $model->setValue('email',$email);
    $model->setValue('specialist',$specialist);
    $model->setValue('img', $new_file_name);
    if ($model->insertDoc()) {
      header('location:index.php?controller=Admin&task=index');
    } else {
      require_once('View/add_doctor.php');
    }
  }
  /* Update Doctor */
  function updateForm()
  {
    $id=$_GET['id'];
    $model= new \Model\Doctor();
    $model->setValue('doc_id',$id);
    $result= $model->select();
    if($result){
      require_once('View/add_doctor.php');
    }else {
      echo $model->error;
    }
  }

  /* Delete Doctor */
  function deleteDoc()
  {
    $model= new \Model\Doctor();
    $model->setValue('doc_id', $_GET['id']);
    if($model->erase()) {
      header('location:index.php?controller=Admin&task=index');
    }
    else {
      // echo $model->error;
      header('location:index.php?controller=Admin&task=index');
    }
  }
  /*---------------------------------------------------------------------------------------*/
  /* Adding the doctor availability*/
  function addAvail()
  {
    $model = new \Model\Doctor();
    $data= $model->selectAll();
    require_once('View/add_availability.php');
  }

  function insertAvailability()
  {
    $id=$_POST['id'];
    $doc=$_POST['doctor'];
    $day= $_POST['day'];
    $start= $_POST['start_time'];
    $end= $_POST['end_time'];

    $model = new \Model\Doctor();
    $model->setValue('avail_id',$id);
    $model->setValue('doc',$doc);
    $model->setValue('day',$day);
    $model->setValue('start_time',$start);
    $model->setValue('end_time',$end);

    if ($model->insertAvailability()) {
      header('location:index.php?controller=Admin&task=viewAvail');
    } else {
      //require_once('View/add_availability.php');
      echo "Error";
    }
  }

  //view Availability
  public function viewAvail()
  {
    $model = new \Model\Doctor();
    $data= $model->selectAvail();

    require_once('View/view_availability.php');
  }

  //Update availability
  function updateAvail()
  {
    $id=$_GET['id'];
    $model= new \Model\Doctor();
    $model->setValue('avail_id',$id);
    $result= $model->selectAvailibility();
    if($result){
      require_once('View/add_availability.php');
    }else {
      echo $model->error;
    }
  }

  //Delete Availability
  function deleteAvailability()
  {
    $model= new \Model\Doctor();
    $model->setValue('avail_id', $_GET['id']);
    if($model->deleteAvail()) {
      header('location:index.php?controller=Admin&task=viewAvail');
    }
    else {
      echo "Error";
      header('location:index.php?controller=Admin&task=viewAvail');
    }
  }

  //For Admin- View Patients
  public function viewPat()
  {
    $model = new \Model\Patient();
    $data= $model->selectAll();

    require_once('View/viewpatients.php');
  }

  //For admin delete Patients
  public function deletePat()
  {
    $model= new \Model\Patient();
    $model->setValue('pat_id', $_GET['id']);
    if($model->erase()) {
      header('location:index.php?controller=Admin&task=viewPat');
    }
    else {
      // echo $model->error;
      header('location:index.php?controller=Admin&task=viewPat');
    }
  }

  //For Admin Add my_appointments
  public function addAppoint()
  {
    $model = new \Model\Appointment();
    $data = $model->selectAllDoctor();
    // var_dump($data);
    // $res= $model->selectAllTimeSlot();
    require_once('View/add_appointment.php');

  }
  //For Admin-View Appointments
  public function viewApp()
  {
    $model= new \Model\Appointment();
    $data=$model->selectAll();

    require_once('View/viewappointments.php');
  }



  function viewAdmin()
  {
    $model = new \Model\Admin();
    $data= $model->selectAllAdmin();

    require_once('View/view_admin.php');
  }

  function addAdminForm()
  {
    $model= new \Model\Admin();
    require_once('View/add_admin.php');
  }

  public function insertAdmin()
  {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password=$_POST['password'];

    $model= new \Model\Admin();
    $model->setValue('admin_id',$id);
    $model->setValue('name',$name);
    $model->setValue('mobile',$mobile);
    $model->setValue('email',$email);
    $model->setValue('password',$password);

    if ($model->insertAdmin()) {
      session_start();
      $success = "Admin Has Been Added Successfully";
      $_SESSION['success'] = $success;
      header('location:index.php?controller=Admin&task=viewAdmin');
    } else {
      require_once('View/add_admin.php');
    }
  }
  /* Update Admin */
  function updateAdmin()
  {
    $id=$_GET['id'];
    $model= new \Model\Admin();
    $model->setValue('admin_id',$id);
    $result= $model->selectAdmin();
    if($result){
      require_once('View/add_admin.php');
    }else {
      echo $model->error;
    }
  }

  /* Delete Admin */
  function deleteAdmin()
  {
    $model= new \Model\Admin();
    $model->setValue('admin_id', $_GET['id']);
    if($model->eraseAdmin()) {
      header('location:index.php?controller=Admin&task=viewAdmin');
    }
    else {
      // echo $model->error;
      header('location:index.php?controller=Admin&task=viewAdmin');
    }
  }
}

?>
