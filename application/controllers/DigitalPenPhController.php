<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DigitalPenPhController extends CI_Controller {

    private $layout;

    public function __construct() {
        parent::__construct();
        $this->layout = $this->config->item('layout');
    }

    public function index() {
        $data = array(
            'content' => 'frontpage/index'
        );
        $this->load->view($this->layout, $data);
    }

}
