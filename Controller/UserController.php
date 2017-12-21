<?php
namespace Controller;

session_start();

use Model;

class UserController
{

  public function regForm()
  {
    $model= new \Model\Patient();
    require_once('template/register_form.php');
  }

  public function insertPatient()
  {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mobile_no=$_POST['mobile_no'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $model= new \Model\Patient();
    $model->setValue('pat_id',$id);
    $model->setValue('name',$name);
    $model->setValue('address',$address);
    $model->setValue('gender',$gender);
    $model->setValue('dob',$dob);
    $model->setValue('mobile_no',$mobile_no);
    $model->setValue('email',$email);
    $model->setValue('username',$username);
    $model->setValue('password',$password);
    if ($model->insertPat()) {
      echo "<script> alert('You are succesfully registered.Please login!') </script>";
      require_once('template/login_form.php');
    } else {
      require_once('template/register_form.php');
    }
  }

  public function loginPage()
  {
    require_once('template/login_form.php');
  }

  public function loginUser()
  {
    $username= $_POST['username'];
    $password= $_POST['password'];

    $model = new \Model\Patient();
    $model->setValue('username', $username);
    $model->setValue('password',$password);
    $data= $model->validateUser();
    if(!empty($data)){
     $_SESSION['patient_id'] = $data['0']['pat_id'];
      header("Location:index.php?controller=Patient&task=selectDoc");
    }
    else {
      header("Location:index.php?controller=User&task=loginPage");
    }

  }


  public function indexPage()
  {
    require_once('template/index.php');
  }

  public function doctorPage()
  {
    $model = new \Model\Doctor();
    $data= $model->selectAll();

    require_once('template/doctor.php');
  }

  public function aboutPage()
  {
    require_once('template/about.php');
  }

  public function contactPage()
  {
    require_once('template/contact.php');
  }

   public function helpPage()
  {
    require_once('template/help.php');
  }

}

?>
