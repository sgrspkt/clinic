<?php

namespace Controller;
session_start();
use Model;
use Library\DbConnect as Connection;

class AppointmentController extends Connection
{

  public function addAppointment()
  {
  	$model = new \Model\Appointment();
    $model->setValue('doctor', $_GET['id']);
    $docname=$model->selectAllDoctor();
    if (sizeof($docname) > 0) {
      $docname = $docname[0]['name'];
    }
    require_once('template/make_appointment.php');

  }

  // function finalAppointment()
  // {
  //   if (isset($_POST['scheduled_date']) && isset($_GET['id'])) {
  //     $model = new \Model\Appointment();
  //     $model->setValue('doctor', $_GET['id']);
  //     $model->setValue('app_time',$_POST['scheduled_date']);
  //     // $appdocname= $model->selectAppDocName();
  //     // $appdoctime= $model->selectAppTimeSlot();
  //     // $docname=$model->selectAllDoctor();
  //     $dd = $model->docAvailabilty();
  //     // var_dump($appdocname, $appdoctime);
  //
  //       require_once('template/final_appointment.php');
  //
  //   }
  //
  //   function appTime()
  //   {
  //
  //   }
  // }

  public function insertAppointment()
  {
    $id=$_POST['id'];
    $pat_name=$_POST['pat_name'];
    $doctor=$_POST['doctor'];
    $scheduled_date=$_POST['scheduled_date'];
    $scheduled_time=$_POST['scheduled_time'];
    $mobile_no=$_POST['mobile_no'];
    $email=$_POST['email'];
    $problem=$_POST['problem'];

    $model= new \Model\Appointment();
    $model->setValue('app_id',$id);
    $model->setValue('pat_name',$pat_name);
    $model->setValue('doctor',$doctor);
    $model->setValue('scheduled_date',$scheduled_date);
    $model->setValue('scheduled_time',$scheduled_time);
    $model->setValue('mobile_no',$mobile_no);
    $model->setValue('email',$email);
    $model->setValue('problem',$problem);

    if ($model->insertApp()) {
      $_SESSION['success'] = "Appoinment has Been Inserted";
      header('location:index.php?controller=patient&task=viewApp');
    } else {
      require_once('template/make_appointment.php');
    }
  }


  public function insertAppointmentAdmin()
  {
    $pat_name=$_POST['pat_name'];
    $doctor=$_POST['doc_id'];
    $scheduled_date=$_POST['scheduled_date'];
    $scheduled_time=$_POST['scheduled_time'];
    $mobile_no=$_POST['mobile_no'];
    $email=$_POST['email'];
    $problem=$_POST['problem'];

    $model= new \Model\Appointment();
    $model->setValue('pat_name',$pat_name);
    $model->setValue('doctor',$doctor);
    $model->setValue('scheduled_date',$scheduled_date);
    $model->setValue('scheduled_time',$scheduled_time);
    $model->setValue('mobile_no',$mobile_no);
    $model->setValue('email',$email);
    $model->setValue('problem',$problem);

    if ($model->insertApp()) {
      header('location:index.php?controller=admin&task=viewApp');
    } else {
      echo "ERROR";
      die();
    }
  }


  public function insertAppointmentClient()
  {
    $pat_name=$_POST['pat_name'];
    $doctor=$_POST['doc_id'];
    $scheduled_date=$_POST['scheduled_date'];
    $scheduled_time=$_POST['scheduled_time'];
    $mobile_no=$_POST['mobile_no'];
    $email=$_POST['email'];
    $problem=$_POST['problem'];
    $patient_id = $_SESSION['patient_id'];

    $model = new \Model\Appointment();
    $model->setValue('pat_name',$pat_name);
    $model->setValue('doctor',$doctor);
    $model->setValue('scheduled_date',$scheduled_date);
    $model->setValue('scheduled_time',$scheduled_time);
    $model->setValue('mobile_no',$mobile_no);
    $model->setValue('email',$email);
    $model->setValue('problem',$problem);
    $model->setValue('patient_id',$patient_id);

    if ($model->insertApp()) {
      header('location:index.php?controller=Patient&task=viewApp');
    } else {
      echo "ERROR";
      die();
    }
  }
/*Update Appointment
  function updateForm()
  {
    $id=$_GET['id'];
    $model= new Model\Appointment();
    $model->setValue('app_id',$id);
    $result= $model->select();

    if($result){
      require_once('template/make_appointment.php');
    }else {
      echo $model->error;
    }
  }*/

//Delete Appointment
  function delApp(){
    $model= new \Model\Appointment();
    $model->setValue('app_id', $_GET['id']);
    if($model->erase()) {
      header('location:index.php?controller=Admin&task=viewApp');
    }
    else {
      // echo $model->error;
      header('location:index.php?controller=Admin&task=viewApp');
    }
  }


  function conAppMail(){
    $doc = new \Model\Doctor();
    $model = new \Model\Appointment();
    $model->setValue('app_id', $_GET['id']);
    $values = $model->selectAppoinmet();

    foreach ($values as  $value) {
      $doc->setValue('doc_id', $value['doc_id']);
      $docn = $doc->selectDoc();

      foreach ($docn as $docName ) {

        $subject = "Appoinment Has Been confirmed";
        $mailto = $value['email'];
       $txt = "Dear <b>".$value['pat_name']."</b><br>Your Appointment has been confirmed on <b>".$value['scheduled_date']."</b> at <b>".$value['scheduled_time']."</b> with <b>Dr.".$docName['name']."</b><br>Thank You.";
                $txt = wordwrap($txt, 70, "\r\n");
                // echo $value['pat_name'];
                // echo $value['scheduled_date'];
                // echo $docName['name'];
                // die();
         $n = require 'mail/PHPMailerAutoload.php';
         $mail = new \PHPMailer();
         $mail ->IsSmtp();
         $mail ->SMTPDebug = 0;
         $mail ->SMTPAuth = true;
         $mail ->SMTPSecure = 'ssl';
         $mail ->Host = "smtp.gmail.com";
         $mail ->Port = 465; // or 587
         $mail ->IsHTML(true);
         $mail ->Username = "clinicalappointment017@gmail.com";
         $mail ->Password = "Clinic123";
         $mail ->SetFrom("admin-clinical@gmail.com");
         $mail ->Subject = $subject;
         $mail ->Body = $txt;
         $mail ->AddAddress($mailto);
         $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

         if(!$mail->Send())
         {
             echo "Mail Not Sent" . $mail->ErrorInfo;

         }else{

             $n = new \Model\Appointment();
            // var_dump($n);
             //die();
             $n->setValue('app_id', $_GET['id']);
             $d = $n->confirmAppoinment();
         }
      }
    }

  }

  function sendMails(){
    $model = new \Model\Appointment();
    $model->sendMail();
  }
}
?>
