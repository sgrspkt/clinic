<?php
namespace Model;

session_start();

use Library;

class Login extends Library\DbConnect
{
  private $id;
  private $email;
  private $password;

  public function __construct()
  {
    parent::__construct();
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

  public function userValidation(){
    $query = "SELECT * from tbl_admin WHERE email = '$this->email' AND password = '$this->password'";
    $data = $this->view($query);

    if($data){
      $_SESSION['admin_id'] = $data['0']["admin_id"];
         header("location: index.php?controller=admin&task=dashboard");
          die();
    }else{
      $_SESSION['error'] = "ERROR";
     header("Location:index.php?controller=login&task=callLoginForm");
      die();
    }
  }

  public function logout(){
    unset($_SESSION);
    session_destroy();
    header("location: index.php?controller=Login&task=callLoginForm");
  }

  public function logoutClient()
  {
    unset($_SESSION);
    session_destroy();
    header("location: index.php?controller=Patient&task=LoginPage");
  }

}
 ?>
