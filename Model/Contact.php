<?php
namespace Model;

use Library;

class Contact extends Library\DbConnect
{

  private $name;
  private $email;
  private $mobile_no;
  private $subject;

  function __construct()
  {
    parent:: __construct();

    $this->name="";
    $this->email="";
    $this->mobile_no="";
    $this->subject="";
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
  function insertcont()
  {
      $query = "INSERT INTO `contact`( `name`,`email`, `mobile_no`, `subject`)
      VALUES(?,?,?,?)";
      $data=[$this->name,$this->email,$this->mobile_no, $this->subject];
      return $this->insert($query,$data);
    }


    function selectContact()
    {
      $query= "SELECT * FROM contact";
      $data=$this->view($query);
      return $data;
    }
  }
