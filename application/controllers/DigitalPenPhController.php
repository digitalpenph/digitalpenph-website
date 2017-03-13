<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DigitalPenPhController extends CI_Controller {

    private $layout;

    public function __construct() {
        parent::__construct();
        $this->layout = $this->config->item('layout');
    }

    public function index() {
        $navigation = array(
            array("Name" => "About", "Location" => "#about"),
            array("Name" => "Team", "Location" => "#team"),
//            array("Name" => "Portfolio", "Location" => "#portfolio"),
            array("Name" => "Contact", "Location" => "#contact")
        );
        $team = array(
            array("Image" => "assets/img/team/kevin.jpg", "Name" => "MARK KEVIN AGANUS", "Position" => "DESIGNER"),
            array("Image" => "assets/img/team/tristan.jpg", "Name" => "TRISTAN JAKE ALCANTARA", "Position" => "PROGRAMMER"),
            array("Image" => "assets/img/team/von.jpg", "Name" => "VON JOEFREY ORPIA", "Position" => "PROGRAMMER"),
            array("Image" => "assets/img/team/dale.jpg", "Name" => "DALE JUSTINE RABENA", "Position" => "PROGRAMMER"),
            array("Image" => "assets/img/team/rolly.jpg", "Name" => "JOHN MARK ROCO", "Position" => "PROGRAMMER"),
            array("Image" => "assets/img/team/ace.jpg", "Name" => "ACE TUMANENG", "Position" => "PROGRAMMER"),
            array("Image" => "assets/img/team/zoft.jpg", "Name" => "ZOFRENTE VALENZUELA", "Position" => "DESIGNER"),
            array("Image" => "assets/img/team/aron.jpg", "Name" => "ARON VIDA", "Position" => "PROGRAMMER")
        );

        $data = array(
            'content' => 'frontpage/index',
            'navigation' => $navigation,
            'team' => $team
        );
        $this->load->view($this->layout, $data);
    }

    public function contactus(){
      $this->load->library('phpmail');
      // $captcha = $_POST['g-recaptcha-response'];
      if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['message'])){
      	      $name = $_POST['name'];
	      $email = $_POST['email'];
	      $contact = $_POST['contact'];
	      $message = $_POST['message'];
             date_default_timezone_set('Etc/UTC');
      //     $response=googleRecaptcha(array('secret'=>G_KEY,'response'=>$captcha,'remoteip'=>REMOTE_IP));
      //     $data = json_decode($response);
      // if($data->success) {
         	$smptConf = $this->config->item('SMTP_Settings');
        	$message = 'Company: '.$name." \n"
        			.'Email: '.$email." \n"
              .'Contact: '.$contact." \n"
        			.'Message: '.$message;

          // $this->phpmail = new PHPMailer;
        	//$this->phpmail->isSMTP();                                      // Set mailer to use SMTP
        	//$this->phpmail->SMTPDebug = $smptConf['Debug'];                               // Enable verbose debug output
        	$this->phpmail->Host = $smptConf['Server'];  // Specify main and backup SMTP servers
        	$this->phpmail->SMTPAuth = $smptConf['Auth'];                               // Enable SMTP authentication
        	$this->phpmail->Password = $smptConf['Password'];				// SMTP password
        	$this->phpmail->SMTPSecure = $smptConf['Security'];                            // Enable TLS encryption, `ssl` also accepted
        	$this->phpmail->Port = $smptConf['Port'];                                    // TCP port to connect to
        	$this->phpmail->WordWrap = 50;
        	$this->phpmail->setFrom($email, $name);
        	$this->phpmail->addAddress('jojimikay15@gmail.com', 'John Mark');  // Add a recipient
        	$this->phpmail->Subject = 'You receive a new message'.$name;
        	$this->phpmail->Body    = $message;
        	if(!$this->phpmail->send()) {
        		$msg = array("error"=>1, "msg"=>"Something went wrong! Error: ". $this->phpmail->ErrorInfo);
        	}
        		$msg = array("error"=>0, "msg"=>"Message sent successfully!");
        echo die(json_encode($msg));
        //End isset
      }
    }
}
