<?php

class Home extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/home_view');
        
        $this->load->view('home/inc/footer_view');
        
    }
    
    public function register()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/register_view');
        
        $this->load->view('home/inc/footer_view');
    }
    
    
}