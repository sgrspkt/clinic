<?php
namespace Controller;

use Model;

class ContactController
{
  public function insertContactPatient()
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile_no=$_POST['mobile_no'];
    $subject=$_POST['subject'];

    $model= new Model\Contact();
    // $model->setValue('cont_id',$id);
    $model->setValue('name',$name);
    $model->setValue('email',$email);
    $model->setValue('mobile_no',$mobile_no);
    $model->setValue('subject',$subject);
    if ($model->insertCont()) {
      header('location:index.php?controller=Patient&task=contactPage');
    } else {
      require_once('template/contact.php');
    }
  }

  public function insertContactUser()
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile_no=$_POST['mobile_no'];
    $subject=$_POST['subject'];

    $model= new Model\Contact();
    // $model->setValue('cont_id',$id);
    $model->setValue('name',$name);
    $model->setValue('email',$email);
    $model->setValue('mobile_no',$mobile_no);
    $model->setValue('subject',$subject);
    if ($model->insertCont()) {
      header('location:index.php?controller=User&task=contactPage');
    } else {
      require_once('template/contact.php');
    }
  }



}





?>
