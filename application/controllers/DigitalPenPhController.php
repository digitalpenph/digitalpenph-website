<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DigitalPenPhController extends CI_Controller {

    private $layout;

    public function __construct() {
        parent::__construct();
        $this->load->library('phpmail');
        $this->layout = $this->config->item('layout');
    }

    public function index() {
        $data = array(
            'content' => 'frontpage/index'
        );
        $this->load->view($this->layout, $data);
    }

    public function contactus(){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $message = $_POST['message'];
      // $captcha = $_POST['g-recaptcha-response'];
      if(isset($name) && isset($email) && isset($contact) && isset($message)){
      //     date_default_timezone_set('Etc/UTC');
      //     $response=googleRecaptcha(array('secret'=>G_KEY,'response'=>$captcha,'remoteip'=>REMOTE_IP));
      //     $data = json_decode($response);
      // if($data->success) {
          $smptConf = $this->config->item('SMTP_Settings');
        	$message = 'Company: '.$name." \n"
        			.'Email: '.$email." \n"
              .'Contact: '.$contact." \n"
        			.'Message: '.$message;
          // $this->phpmail = new PHPMailer;
        	$this->phpmail->isSMTP();                                      // Set mailer to use SMTP
        	$this->phpmail->SMTPDebug = $smptConf['Debug'];                               // Enable verbose debug output
        	$this->phpmail->Host = $smptConf['Server'];  // Specify main and backup SMTP servers
        	$this->phpmail->SMTPAuth = $smptConf['Auth'];                               // Enable SMTP authentication
        	$this->phpmail->Password = $smptConf['Password'];				// SMTP password
        	$this->phpmail->SMTPSecure = $smptConf['Security'];                            // Enable TLS encryption, `ssl` also accepted
        	$this->phpmail->Port = $smptConf['Port'];                                    // TCP port to connect to
        	$this->phpmail->WordWrap = 50;
        	$this->phpmail->setFrom($email, $name);
        	$this->phpmail->addAddress($smptConf['Email'], 'Client');  // Add a recipient
        	$this->phpmail->Subject = 'You receive a new message'.$name;
        	$this->phpmail->Body    = $message;
        	if(!$this->phpmail->send()) {
        		$msg = "Something went wrong!";
        	}
        	else{
        		$msg = "Message sent successfully!";
        	}
        // } else {
        // 	$msg = "Please answer the captcha first";
        // }
        print_r($msg);
        //End isset
      }
      // $data = array('message'=>$msg);
      // $this->load->view($this->layout);
    }
}
