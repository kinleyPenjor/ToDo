<?php
class User extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    
    
    public function get()
    {
        $this->user_model->get(1);
    }
    public function insert()
    {
        $result=$this->user_model->insert(array(
            'login'=>'kims'
            
        ));
        print_r($result);
    }
    public function update()
    {
        $result=$this->user_model->update(array(
            'login'=>'pegy'
        ),1);
        print_r($result);
    }
    public function delete()
    {
        $result=$this->user_model->delete();
    }
}