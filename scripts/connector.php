<?php
  class DBConnect {

    public function __construct() {
      // do nothing? 
    }

    private function Connect() {
      $db_conx = mysqli_connect("localhost", "root", 
                                "toor", "foobtdmp");
      // Evaluate the connection
      if (mysqli_connect_errno()) {
        $this->connectionEstablished_ = false;
        exit();
      } else {
        $this->connectionEstablished_ = true;
      } 
    }

    private function GetStatusConnection() {
      return $this->connectionEstablished_;
    }

    protected $connectionEstablished_;
  }
?>