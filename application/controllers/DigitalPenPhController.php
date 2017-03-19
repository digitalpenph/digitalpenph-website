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
            array("Name" => "Services", "Location" => "#services"),
            array("Name" => "About", "Location" => "#about"),
            array("Name" => "Team", "Location" => "#team"),
            array("Name" => "Contact", "Location" => "#contact")
        );
        $services = array(
            array("Image" => "assets/img/services/web.png", "Name" => "Web App", "Description" => "We provide and develop web applications of an individual."),
            array("Image" => "assets/img/services/mobile.png", "Name" => "Mobile App", "Description" => "We provide and develop mobile applications of an individual."),
            array("Image" => "assets/img/services/app.png", "Name" => "Software App", "Description" => "We provide and develop software application of an individual.")
        );
        $about = "We at DigitalPen PH have a very clear mission in mind and that is to provide IT services to the people in need. It is about simplifying the work, increase sales, perform effective and efficient task, and creativity by using new technologies.";
        $team = array(
            array("Image" => "assets/img/team/tristan.jpg",
                "Name" => "TRISTAN JAKE ALCANTARA",
                "Position" => "PROGRAMMER",
                "Description" => "Tristan Jake Alcantara graduated with a degree of Bachelor of Science in Computer Science at Mariano Marcos State University on 2015. He started his career in PhilWeb Corporation as Applications Developer in the IT department where he developed and maintained PhilWeb services mainly e-Games. He was later promoted to Senior Associate Software Developer and work with the R&D department. He was hired in Interactive Learning Center Diliman as an Emergency Web Service Developer and leads in the development and maintenance of ILC Diliman services. He supports in the multimedia services such as live streaming and video recording. He also facilitates in the training program of ILC Diliman or the Training, Education, Development and Support (TEDS)."),
            array("Image" => "assets/img/team/von.jpg",
                "Name" => "VON JOEFREY ORPIA",
                "Position" => "PROGRAMMER",
                "Description" => "Von Joefrey Orpia undergraduate of a degree Bachelor of Science in Computer Science. Self-learning in the field of web penetration and testing. Basic knowledge in HTML, CSS, JavaScript, PHP, and other programming tools."),
            array("Image" => "assets/img/team/rolly.jpg",
                "Name" => "JOHN MARK ROCO",
                "Position" => "PROGRAMMER",
                "Description" => "John Mark graduated at Polytechnic University of the Philippines, Quezon City Branch with the course of Bachelor of Science in Information Technology. He, have expertise in web development, and primary uses PHP, CSS, Javascript (JQuery) and HTML for Web Development. He is also familiar to other web development frameworks and tools such as Bootstrap, Java Server Page (Servlet w/ JSTL), Codeigniter and Wordpress."),
            array("Image" => "assets/img/team/aaron.jpg",
                "Name" => "JOHN AARON VIDA",
                "Position" => "PROGRAMMER",
                "Description" => "An energetic and imaginative young web developer who is able to work alongside other talented IT professionals in creating websites to the very highest standards. An ambitious type who wants to get noticed, and has the drive and massive energy needed to really make a difference to a project.")
        );

        $data = array(
            'content' => 'frontpage/index',
            'services' => $services,
            'navigation' => $navigation,
            'about' => $about,
            'team' => $team
        );
        $this->load->view($this->layout, $data);
    }

    public function contactus() {
        $this->load->library('phpmail');
        // $captcha = $_POST['g-recaptcha-response'];
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['message'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $message = $_POST['message'];
            date_default_timezone_set('Etc/UTC');
            //     $response=googleRecaptcha(array('secret'=>G_KEY,'response'=>$captcha,'remoteip'=>REMOTE_IP));
            //     $data = json_decode($response);
            // if($data->success) {
            $smptConf = $this->config->item('SMTP_Settings');
            $message = 'Company: ' . $name . " \n"
                    . 'Email: ' . $email . " \n"
                    . 'Contact: ' . $contact . " \n"
                    . 'Message: ' . $message;

            // $this->phpmail = new PHPMailer;
            //$this->phpmail->isSMTP();                                      // Set mailer to use SMTP
            //$this->phpmail->SMTPDebug = $smptConf['Debug'];                               // Enable verbose debug output
            $this->phpmail->Host = $smptConf['Server'];  // Specify main and backup SMTP servers
            $this->phpmail->SMTPAuth = $smptConf['Auth'];                               // Enable SMTP authentication
            $this->phpmail->Password = $smptConf['Password'];    // SMTP password
            $this->phpmail->SMTPSecure = $smptConf['Security'];                            // Enable TLS encryption, `ssl` also accepted
            $this->phpmail->Port = $smptConf['Port'];                                    // TCP port to connect to
            $this->phpmail->WordWrap = 50;
            $this->phpmail->setFrom($email, $name);
            $this->phpmail->addAddress('jojimikay15@gmail.com', 'John Mark');  // Add a recipient
            $this->phpmail->Subject = 'You receive a new message' . $name;
            $this->phpmail->Body = $message;
            if (!$this->phpmail->send()) {
                $msg = array("error" => 1, "msg" => "Something went wrong! Error: " . $this->phpmail->ErrorInfo);
            }
            $msg = array("error" => 0, "msg" => "Message sent successfully!");
            echo die(json_encode($msg));
            //End isset
        }
    }

}
