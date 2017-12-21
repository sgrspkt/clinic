<?php
namespace Model;

use Library;

class Doctor extends Library\DbConnect
{
  private $doc_id;
  private $name;
  private $gender;
  private $address;
  private $mobile_no;
  private $email;
  private $specialist;
  private $img;

  private $avail_id;
  private $doc;
  private $day;
  private $start_time;
  private $end_time;

  // private $id;
  // private $time_id;

  function __construct()
  {
    parent:: __construct();

    $this->doc_id=0;
    $this->name="";
    $this->gender="";
    $this->address="";
    $this->mobile_no="";
    $this->email="";
    $this->specialist="";
    $this->img="";

    //Availability
    $this->avail_id = 0;
    $this->doc="";
    $this->day="";
    $this->start_time="";
    $this->end_time="";

    //Time
    $this->id="";
    $this->time="";
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

  /* Insert and Update Doctor */
  function insertDoc()
  {
    if($this->doc_id > 0){
      $query="UPDATE doctor_info SET name=?, gender=?,address=?, mobile_no=?,email=?, specialist=?, img=? WHERE `doc_id` = ?";
      $data=[$this->name,$this->gender,$this->address,$this->mobile_no,$this->email,$this->specialist, $this->img,$this->doc_id];
      return $this->update($query,$data);
    }else{
      $query = "INSERT INTO `doctor_info`( `name`, `gender`, `address`, `mobile_no`, `email`,`specialist`,`img`)
      VALUES(?,?,?,?,?,?,?)";
      $data=[$this->name,$this->gender,$this->address, $this->mobile_no,$this->email,$this->specialist, $this->img];
      return $this->insert($query,$data);
    }
  }

  /* Select  info of Doctor for update */
  function select()
  {
    $query= "SELECT * FROM doctor_info WHERE doc_id=".$this->doc_id;
    $data= $this->view($query);
    if(!is_null($data)){
      $this->doc_id=$data[0]['doc_id'];
      $this->name=$data[0]['name'];
      $this->gender=$data[0]['gender'];
      $this->address=$data[0]['address'];
      $this->mobile_no=$data[0]['mobile_no'];
      $this->email=$data[0]['email'];
      $this->specialist=$data[0]['specialist'];
      $this->img=$data[0]['img'];
    }else {
      return false;
    }
    return true;
  }


  /* Select all Doctor */
  function selectAll()
  {
    $query= "SELECT * FROM doctor_info";
    $data=$this->view($query);
    return $data;
  }

  /* Select Doctor to display doctor info for Patients*/
  function selectDoc()
  {
    $query= "SELECT * FROM doctor_info WHERE doc_id=".$this->doc_id;
    $data=$this->view($query);
    return $data;
  }

  /* Select Doctor to display doctor info for Patients*/
  function ajaxSelectDoc($id)
  {
    $availability = "SELECT * FROM doctor_info AS doc INNER JOIN doctor_availabilty AS doc_avail ON doc.doc_id = doc_avail.doc_id where doc.doc_id=".$id;

    $data = $this->view($availability);

    return $data;

    // return $data;
  }

  /* Delete Doctor */
  function erase()
  {
    $query = "DELETE  FROM doctor_info WHERE doc_id=".$this->doc_id;
    return $this->delete($query);
  }

  /* Insert or Update Availability */
  function insertAvailability()
  {
    if($_POST['update']){
      $query="UPDATE `doctor_availabilty` SET `start_time` = ?, `end_time` = ? WHERE `avail_id` = ?";
      $data=[$this->start_time,$this->end_time,$this->avail_id];
      return $this->update($query, $data);
    }else{
      $query="INSERT INTO `doctor_availabilty`( `doc_id`, `day`, `start_time`, `end_time`) VALUES (?,?,?,?)";
      $data=[$this->doc, $this->day, $this->start_time, $this->end_time];
      return $this->insert($query,$data);
    }
  }

  //Select for availability
  function selectAvailibility()
  {
    $query= "SELECT * FROM doctor_availabilty WHERE avail_id=".$this->avail_id;

    $data= $this->view($query);
    return $data;
    
    if(!is_null($data)){
      $this->avail_id=$data[0]['avail_id'];
      $this->doc=$data[0]['doc_id'];
      $this->day=$data[0]['day'];
      $this->start_time=$data[0]['start_time'];
      $this->end_time=$data[0]['end_time'];
    }else {
      return false;
    }
    return true;
  }

  function deleteAvail()
  {
    $query= "DELETE FROM doctor_availabilty WHERE avail_id=".$this->avail_id;
    return $this->delete($query);
  }

  //View availability
  function selectAvail()
  {
    $query= "SELECT  doctor_availabilty.avail_id,doctor_info.name, doctor_info.specialist, doctor_availabilty.day, doctor_availabilty.start_time,
    doctor_availabilty.end_time FROM doctor_info,doctor_availabilty WHERE doctor_info.doc_id=doctor_availabilty.doc_id order by doctor_info.name desc";
    $data=$this->view($query);
    return $data;
  }

  //Insert time
  function insertTime()
  {
    $query = "INSERT INTO `doctortime`( `doctor_id`, `time_id`) VALUES(?,?)";
    $data=[$this->doc_id,$this->time];
    return $this->insert($query,$data);
  }

  function docAvailabilty(){
    $query="SELECT doctor_availabilty.start_time, doctor_availabilty.end_time from doctor_availabilty";
    $data=$this->view($query);
    return $data;
  }
}
?>
