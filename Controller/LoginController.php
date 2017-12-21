<?php
namespace Controller;

use Model;

class LoginController
{
  public function callLoginForm()
  {
    require_once('admintemplate/index.php');
  }

  public function loginAdmin()
  {
    $email= $_POST['email'];
    $password= $_POST['password'];
    $table = $_POST['tab_name'];

    $model = new Model\Login();
    $model->setValue('email', $email);
    $model->setValue('password', $password);
    $data = $model->userValidation();
    // if(!empty($data)){
    //   header("Location:index.php?controller=Admin&task=dashBoard");
    // }
    // else {
    //   header("Location:index.php?controller=login&task=callLoginForm");
    // }

  }

  public function logout(){
    $model = new Model\Login();
    $model->logout();
  }

}
?>
