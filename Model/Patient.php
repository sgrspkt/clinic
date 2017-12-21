<?php
namespace Model;

use Library;

class Patient extends Library\DbConnect
{
  private $pat_id;
  private $name;
  private $address;
  private $gender;
  private $dob;
  private $mobile_no;
  private $email;
  private $username;
  private $password;

  function __construct()
  {
    parent:: __construct();

    $this->pat_id=0;
    $this->name="";
    $this->address="";
    $this->gender="";
    $this->dob="";
    $this->mobile_no="";
    $this->email="";
    $this->username="";
    $this->password="";
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


  /* Insert Patient */
  function insertPat()
  {
    if($this->pat_id > 0){
      $query="UPDATE patient_info SET name=?,address=?, gender=?, dob=?, mobile_no=?,email=?, username=?, password=? WHERE `pat_id` = ?";
      $data=[$this->name, $this->address,$this->gender, $this->dob, $this->mobile_no,$this->email,$this->username, $this->password,$this->pat_id];
      return $this->update($query,$data);
    }else{
      $query = "INSERT INTO `patient_info`(`name`, `address`, `gender`, `dob`, `mobile_no`, `email`, `username`, `password`) VALUES(?,?,?,?,?,?,?,?)";
      $data=[$this->name, $this->address,$this->gender, $this->dob, $this->mobile_no,$this->email,$this->username, $this->password];
      return $this->insert($query,$data);
    }
  }

  function select()
  {
    $query= "SELECT * FROM patient_info WHERE pat_id=".$this->pat_id;
    $data= $this->view($query);
    if(!is_null($data)){
      $this->pat_id=$data[0]['pat_id'];
      $this->name=$data[0]['name'];
      $this->address=$data[0]['address'];
      $this->gender=$data[0]['gender'];
      $this->dob=$data[0]['dob'];
      $this->mobile_no=$data[0]['mobile_no'];
      $this->email=$data[0]['email'];
      $this->username=$data[0]['username'];
    }else {
      return false;
    }
    return true;
  }

  /*Select all Patient*/
  function selectAll()
  {
    $query= "SELECT * FROM patient_info";
    $data=$this->view($query);
    return $data;
  }
  /*Delete Patient*/
  function erase()
  {
    $query = "DELETE  FROM patient_info WHERE pat_id=".$this->pat_id;
    return $this->delete($query);
  }

  function validateUser()
  {
    $query="SELECT * from patient_info WHERE username='$this->username' AND password='$this->password' ";
    $data=$this->view($query);
    return $data;
  }


}
?>
