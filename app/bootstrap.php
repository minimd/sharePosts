<?php
//LOAD CONFIG

require_once 'config/config.php';

//load helpers
require_once 'helpers/url_helper.php';

  // Load Libraries

  // AUTOLOAD CORE libs
  spl_autoload_register(function(
    $class_name){
    require_once 'libraries/'.$class_name.'.php';

    }
  );
