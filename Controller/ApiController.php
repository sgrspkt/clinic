<?php
namespace Controller;

session_start();

use Model\Doctor as Doc;

class ApiController
{
  //Admin Dashboard
  public function __construct() {

    // if(!$_SESSION['logged_in'])
    // {
    //   header("location: index.php?controller=Login&task=callLoginForm");
    // }
    
  }

  public function testDoc(){
    $c = new Doc();
    $this->toJSON($c->selectAll());

  }

  /* Select Doctor to display doctor info for Patients*/
  function selectDoc()
  {

    $oneDoc = new Doc();
    $responce = $oneDoc->ajaxSelectDoc($_GET['doc_id']);

    $this->toJSON($responce);
  }

  public function fixAppoinment(){

    $total_appoinments = json_decode($_POST["doc_info"],true);
    $total_doc_days = count($total_appoinments);

    $sel_date = \DateTime::createFromFormat("Y-m-d", $_POST["selected_date"]);
    $selected_date = $sel_date->format("l");


    function whichKey($total_appoinments, $selected_date) {
      $k = false;
      foreach ($total_appoinments as $key => $value) {
        if($value["day"] == $selected_date){
          $k = $key;
        }
      }

      return $k;
    }
    
    $doc_day_key = whichKey($total_appoinments, $selected_date);

    if($doc_day_key !== false) {
      
      $cur_doc_detail = json_decode($_POST["doc_info"])[$doc_day_key];

      $app = new \Model\Appointment;

      $total_index = abs(round((strtotime($cur_doc_detail->start_time) - strtotime($cur_doc_detail->end_time))/3600, 1)) * 4;

      $avail_dates = [];



      // Get reserv dates
      function getReserveDate($dates) {
        $reserved_times = [];
        if(count($dates) && count($dates) == 1) {
          $reserved_times = $dates[0]["scheduled_time"];
        } else {
          foreach ($dates as $key => $value) {
            array_push($reserved_times, $value["scheduled_time"]);
          }
        }

        return $reserved_times;
      }


      $reserve_dates = $app->getReserveDates($_POST["selected_date"], $cur_doc_detail->doc_id);
      $reserve_dates = getReserveDate($reserve_dates);
    

      $current = strtotime($cur_doc_detail->start_time);

      for($i = 0; $i < $total_index; $i++) 
      {
        array_push($avail_dates, date("h:i:s",$current));
        $current = strtotime("+15 minutes", $current);
       
      }

    } else {
      $avail_dates["error"] = "Selected day is not available";
    }

    if(!array_key_exists("error", $avail_dates)) {
      foreach ($avail_dates as $key => $value) {
        if(in_array($value, $reserve_dates)){
          unset($avail_dates[$key]);
        }
      }
    }
  
    return $this->toJSON($avail_dates);
  }


  public function toJSON($data) {
    return print_r(json_encode($data));
  }

}
