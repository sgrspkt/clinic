<?php
namespace Controller;

session_start();

use Model;

class PatientController
{
  public function __construct() {

    if(!$_SESSION['patient_id'])
    {
      header("location: index.php?controller=User&task=LoginPage");
    }
  }

  // function updateForm()
  // {
  //   $id=$_GET['id'];
  //   $model= new \Model\Patient();
  //   $model->setValue('pat_id',$id);
  //   $result= $model->select();
  //   if($result){
  //     require_once('template/register_form.php');
  //   }else {
  //     echo $model->error;
  //   }
  // }
  public function selectDoc()
  {
    $model = new Model\Doctor();
    $data= $model->selectAll();

    require_once('template/p_doctor.php');
  }

  public function viewApp()
  {
    $p = $_SESSION['patient_id'];
    $model = new Model\Appointment();
    $model->setValue('app_id', $p);
    $data= $model->viewApp();

    require_once('template/my_appointments.php');
  }

  public function aboutPage()
  {
    require_once('template/about.php');
  }

  public function helpPage()
  {
    require_once('template/p_help.php');
  }
  public function contactPage()
  {
    require_once('template/p_contact.php');
  }

  public function addAppointment()
  {
    $model = new Model\Appointment();
    $data= $model->selectAllDoctor();
    //$res= $model->selectAllTimeSlot();
    require_once('template/make_appointment.php');
  }

  public function loginPage(){
    require_once('template/login_form.php');
  }

   public function logout(){
    $model = new \Model\Login();
    $model->logoutClient();
  }
}
?>
