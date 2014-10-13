<?php

  include 'connector.php';
  /**
  *  Generates Web page, template style(?)
  *  automatically does the head links for HTML
  *  @param string $title title of the page
  */
  class WebPage
  {
    public function __construct($title) {
      $this->title_ = $title;
      $this->DotDotsCalc();
      //$this->datab_ = new DBConnect();
    }

    public function SetContent($content ="") {
      if ($this->subnav == true) {
        $this->content_ = $this->SubNavigation();
      } else {
        $this->content_ = "";
      }

      $this->content_= $this_->content_ .
      '<div id="content-contain">' . 
      $content . 
      '</div>';
    }

    /**
     * Generates page automatically
     */
    public function GeneratePage() {
      echo $this->Head() . $this->Navigation() . 
      $this->content_ . $this->SetContent_DB() .
      $this->Foot();
    }

    private function Head() {
      return '
      <!DOCTYPE html>
      <html>
        <head>
          <title>' . $this->title_ . '</title>
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <link rel="stylesheet" type="text/css" href="' . $this->dotdots_ . 'styles/stylesheet.css">
          <script type="text/javascript" src="' . $this->dotdots_ . 'scripts/script.js"></script>
        </head>
        <body>';
    }

    private function Foot() {
      return '
        </body>
      </html>
      ';
    }

    private function Navigation() {
      return '
      <a href="#"><img id="logo" src="' . $this->dotdots_ . 'images/fez-foobt-logo.png"></a>
      <div id="navigation">
      <ul>
        <li><a href="' . $this->dotdots_ . ' index.php"><span>Home</span></a></li>
        <li><a href="http://blog.foobt.net"><span>Blog</span></a></li>
        <li><a href="' . $this->dotdots_ . 'contact.php"><span>Contact</span></a></li>
        <li><a href="' . $this->dotdots_ . 'about.php"><span>About</span></a></li>
      </ul>
      </div>';
    }

    private function SubNavigation() {
      return '
          <div id="subnavi">
              <ul>
                <li><a href="#"><span>Announcements</span></a></li>
                <li><a href="#"><span>Schedule</span></a></li>
                <li><a href="#"><span>Assignments</span></a></li>
                <li><a href="#"><span>Files</span></a></li>
                <li><a href="#"><span>Syllabus</span></a></li>
                <li><a href="#"><span>Links</span></a></li>
              </ul>
            </div>';
    }

    /**
     * Gets the current working directory and calculates
     * the "../" needed to reference root directory
     */
    private function DotDotsCalc() {
      $currentdir = getcwd();
      $subdirs = 0;
      for($i = 0; $i < strlen($currentdir); $i += 1) {
        if($currentdir[$i] == '/')
          $subdirs += 1;
      }
      // Because of /var/www/etc...
      // we will ignore 3 of them to account for this.
      $subdirs -= 3;
      if($subdirs == 0) {
        $this->dotdots_ = "";
      } else {
        $this->dotdots_ = "../";
        for($i = 1; $i < $subdirs; $i += 1) {
          $this->dotdots_ = $this->dotdots_ . "../";
        }
      }
    }

    private function SetContent_DB() {
      // $this->datab_->Connect();
      // if ($this->datab_->GetStatusConnection() == false) {
      //   return "Connection to database Failed";
      // } else {
      //   return "Connection to database Made.";
      // }
    }

    public function test() {
      echo 'Hello!';
    }
    protected $datab_;
    protected $title_;
    protected $dotdots_;
    protected $content_;
    protected $subnav = true;
  };
?>