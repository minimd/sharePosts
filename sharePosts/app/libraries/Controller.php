<?php
  /*
   * Base Controller.. this controller is going to be used in other classes
   */
  class Controller {
    // Load model
    public function model($model){
      // Require model
      require_once '../app/models/' . $model . '.php';

      // Initiaite model
      return new $model();
    }

    // Load view
    public function view($view, $data = []){
      // Check view file
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die('View is not available');
      }
    }
  }