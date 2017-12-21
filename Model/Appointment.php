<?php
namespace Model;

use Library;

class Appointment extends Library\DbConnect
{
  private $app_id;
  private $pat_name;
  private $doctor;
  private $scheduled_date;
  private $scheduled_time;
  private $mobile_no;
  private $email;
  private $problem;
  private $app_time;
  private $confirm;
  private $date;
  private $time;
  private $patient_id;

  function __construct()
  {
    parent:: __construct();

    $this->app_id=0;
    $this->pat_name="";
    $this->doctor="";
    $this->scheduled_date="";
    $this->scheduled_time="";
    $this->mobile_no="";
    $this->email="";
    $this->problem="";
    $this->app_time=0;
    $this->confirm = 0;
    $this->date;
    $this->time;
    $this->patient_id = 0;
  }

  function getValue($key)
  {
    if(isset($this->$key)){
      return $this->$key;
    }
    return null;
  }

  function setValue($key, $value)
  {
    if(isset($this->$key)){
      $this->$key = $value;
    }
  }

/* Insert or Update Appointment*/
function insertApp(){

    if($this->app_id > 0){
      $query="UPDATE `appointment` SET `pat_name`=?,`doc_id`=?,`scheduled_date`=?,`scheduled_time`=?, `mobile_no`=?,`email`=?,`problem`=? WHERE `app_id` = ?";
      $data=[$this->pat_name,$this->doctor,$this->scheduled_date, $this->scheduled_time, $this->mobile_no,$this->email,$this->problem,$this->app_id];
      return $this->update($query,$data);

    }else{
      $query = "INSERT INTO `appointment`(`pat_name`, `doc_id`, `scheduled_date`, `scheduled_time`, `mobile_no`, `email`, `problem`, `patient_id`) VALUES(?,?,?,?,?,?,?,?)";
      $data=[$this->pat_name, $this->doctor,$this->scheduled_date, $this->scheduled_time, $this->mobile_no,$this->email,$this->problem,$this->patient_id];
      // die($query);
      return $this->insert($query,$data);
    }
  }

  function add(){
    $query = "INSERT INTO `appointment`(`pat_name`, `doc_id`, `scheduled_date`, `scheduled_time`, `mobile_no`, `email`, `problem`) VALUES(?,?,?,?,?,?,?)";
      $data=[$this->pat_name, $this->doctor,$this->scheduled_date, $this->scheduled_time, $this->mobile_no,$this->email,$this->problem];
      // die($query);
      return $this->insert($query,$data);
  }

/* Select Appointment*/
  function select()
  {
    $query= "SELECT * FROM appointment WHERE app_id=".$this->app_id;
    $data= $this->view($query);
    if(!is_null($data)){
      $this->app_id=$data[0]['app_id'];
      $this->pat_name=$data[0]['pat_name'];
      $this->doctor=$data[0]['doc_id'];
      $this->scheduled_date=$data[0]['scheduled_date'];
      $this->scheduled_time=$data[0]['scheduled_time'];
      $this->mobile_no=$data[0]['mobile_no'];
      $this->email=$data[0]['email'];
      $this->problem=$data[0]['problem'];
    }else {
      return false;
    }
    return true;
  }

/* Select all Appointment for Admin*/
function selectAll()
{
  $query= "SELECT  appointment.app_id, appointment.pat_name, doctor_info.name, appointment.scheduled_date, appointment.scheduled_time
  ,appointment.mobile_no, appointment.email, appointment.problem, appointment.confirm FROM appointment, doctor_info WHERE appointment.doc_id= doctor_info.doc_id";
  $data=$this->view($query);
  return $data;
}

  function erase(){
    $query= "DELETE  FROM appointment WHERE app_id=".$this->app_id;
    $data=$this->view($query);
    return $data;
  }

/* View Appointments for patients */
  function viewApp(){
    $query= "SELECT a.app_id,a.pat_name, d.name, a.scheduled_date,a.scheduled_time,a.problem,a.confirm FROM appointment a, doctor_info d
     WHERE a.doc_id=d.doc_id AND a.patient_id=".$this->app_id;
    $data=$this->view($query);
    return $data;
  }

  public function selectAppoinmet(){
    $query= "SELECT pat_name, doc_id, scheduled_date, scheduled_time, email FROM appointment WHERE app_id=".$this->app_id;
    $data = $this->view($query);
    return $data;
  }

  public function confirmAppoinment(){
    $query = "UPDATE `appointment` SET `confirm`= '1' WHERE app_id=".$this->app_id;
    $data = $this->view($query);
    if(!empty($data)){
      echo "OOPS! Error";
     }else{
      header("Location: http://localhost/clinic/index.php?controller=Admin&task=viewApp");
     }
  }

  function sendMail(){
    $currenttime = date('H:i');
    $currenttime = date('H:i',strtotime('+3 hour')); //Added 3 hours in the current time
    $date = date('Y-m-d');
    $query = "SELECT * FROM appointment WHERE scheduled_date = '$date'";
    $data = $this->view($query);
    foreach ($data as $key) {
      $time_db = $key['scheduled_time'];
      $parts = explode( ':', $time_db); //triming the value comming from the database and only grabing
      $times = $parts[0].':'.$parts[1]; //retriving the value by removing 00 only H-m
      if($time_db == $currenttime){
        $subject = "Appoinment Time Alert";
        $mailto = $key['email'];
       $txt = "Dear <b>".$key['pat_name']."</b><br>Only 3 Hours is left in your appoinment.<br>Thank You.";
                $txt = wordwrap($txt, 70, "\r\n");
         $n = require '../mail/PHPMailer-master/PHPMailerAutoload.php';
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
             echo "Mail Not Sent";
         }
         else
         {
             echo "Mail Sent Successfully";
         }
       }
    }
  }


/* Select the doctors*/
  function selectAllDoctor(){
  	$query = "SELECT *  FROM doctor_info";
  	$data = $this->view($query);
  	return $data;
  }

  function docAvailabilty(){
    $query="SELECT start_time, end_time from doctor_availabilty WHERE doc_id=".$this->doctor;
    // die($query);
    $data=$this->view($query);
    return $data;
  }

  function updateAppintment($lastStartTime, $id) {

    $updatedTime = strtotime($lastStartTime) + 900;
    $query = "UPDATE doctor_availabilty SET start_time = ".$updatedTime." WHERE avail_id=".$id;
    $query->execute();
  }

  function getReserveDates($userDate, $id) {
    $query = "SELECT scheduled_date, scheduled_time FROM appointment where doc_id=".$id." AND scheduled_date ='".$userDate."'";
    $reserve = $this->view($query);
    return $reserve;
  }

}

?>
