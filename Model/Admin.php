<?php
namespace Model;

use Library;

class Admin extends Library\DbConnect
{
  private $admin_id;
  private $name;
  private $mobile;
  private $email;
  private $password;


  function __construct()
  {
    parent:: __construct();

    $this->admin_id=0;
    $this->name="";
    $this->mobile="";
    $this->email="";
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

  /* Insert and Update Admin */
  function insertAdmin()
  {
    if($this->admin_id > 0){
      $query="UPDATE tbl_admin SET name=?, mobile_no=?,email=?, password=? WHERE `admin_id` = ?";
      $data=[$this->name,$this->mobile,$this->email,$this->password,$this->admin_id];
      return $this->update($query,$data);
    }else{
      $query = "INSERT INTO `tbl_admin`( `name`, `mobile_no`, `email`, `password`)
      VALUES(?,?,?,?)";
      $data=[$this->name,$this->mobile,$this->email, $this->password];
       return $this->insert($query,$data);
    }
  }

  /* Select  info of Admin for update */
  function selectAdmin()
  {
    $query= "SELECT * FROM tbl_admin WHERE admin_id=".$this->admin_id;
    $data= $this->view($query);
    if(!is_null($data)){
      $this->admin_id=$data[0]['admin_id'];
      $this->name=$data[0]['name'];
      $this->mobile=$data[0]['mobile_no'];
      $this->email=$data[0]['email'];
      $this->password=$data[0]['password'];
    }else {
      return false;
    }
    return true;
  }


  /* Select all Admin */
  function selectAllAdmin()
  {
    $query= "SELECT * FROM tbl_admin";
    $data=$this->view($query);
    return $data;
  }

  function eraseAdmin()
  {
    $query = "DELETE  FROM tbl_admin WHERE admin_id=".$this->admin_id;
    return $this->delete($query);
  }
  }
