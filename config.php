<?php

define("__HOST", "localhost");
define("__DBNAME", "clinical_appointment");
define("__USERNAME","root");
define("__PASSWORD", "");

spl_autoload_register(function($classname){
  $classname= str_replace("\\", "/", $classname);
  if(file_exists($classname.".php")){
    include_once($classname.".php");
  }
});

?>
