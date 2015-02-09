<?php
class Api extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        
    }
    
    
//============================================================================================================
    
    private function _require_login()
    {
       if($this->session->userdata('user_id')==FALSE){
            $this->output->set_output(json_encode(array('result'=>0,'error'=>'You are nope')));
        }
    }

    //============================================================================================================
    
    public function login(){
        
        $this->load->model('user_model');
        $login=$this->input->post('login');
        $password=$this->input->post('password');
        //hash('sha256',$password.SALT);
        $result=$this->user_model->get(array(
            'login'=>$login,
            'password'=>hash('sha256',$password.SALT)
            
        ));
        $this->output->set_content_type('application_json');
        if($result){
            $this->session->set_userdata(array('user_id'=>$result[0]['user_id']));
            
            $this->output->set_output(json_encode(
                    array('result'=>1)
                    ));
            return false;
        }
        $this->output->set_output(json_encode(array('result'=>0)));
    }
    
    //============================================================================================================
    
    public function register(){
        $this->output->set_content_type('application_json');
        $this->form_validation->set_rules('login','Login','required|min_length[4]|max_length[16]|is_unique[user.login]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required');
        if($this->form_validation->run()==false){
            
            $this->output->set_output(json_encode(array('result'=>0,'error'=>$this->form_validation->error_array())));
            return FALSE;
        }
        
        $this->load->model('user_model');
        $login=$this->input->post('login');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $confirm_password=$this->input->post('confirm_password');
        
        $user_id=$this->user_model->insert(array(
            'login'=>$login,
            'email'=>$email,
            'password'=>hash('sha256',$password.SALT)
            
        ));
        
        if($user_id){
            $this->session->set_userdata(array(
                'user_id'=>$user_id
            ));
            $this->output->set_output(json_encode(array('result'=>1)));
            return FALSE;
        }
       $this->output->set_output(json_encode(array('result'=>0,'error'=>'user not created')));
    }
    
//============================================================================================================
        
    public function  get_todo($id=null){
        
         $this->_require_login();
         if($id!=null){
             $this->db->where(array(
                 'todo_id'=>$id,
                 'user_id'=>$this->session->userdata('user_id')
             ));
         }else{
             $this->db->where('user_id',$this->session->userdata('user_id'));
         }
         
         $query=$this->db->get('todo');
         $result=$query->result();
         $this->output->set_output(json_encode($result));
     }
     
//============================================================================================================
public function edit_todo(){
    $this->_require_login();
    
    $todo_id=$this->input->post('todo_id');
    $result=$this->db->update('todo',array(
        'content'=>$this->input->post('content'),
        'date_added'=>$this->input->post('date_added')
            ),$todo_id);
     if($result){
            
            $this->output->set_output(json_encode(array(
                'result'=>1
                //'data'=>$query->result()
                )));
            return FALSE;
        }
       $this->output->set_output(json_encode(array(
           'result'=>0
           //'error'=>'could not insert'
           )));
}


//============================================================================================================

     public function create_todo(){
         
        $this->_require_login();
        $this->form_validation->set_rules('content','Content','required|max_length[255]');
        $this->form_validation->set_rules('date_added','Date','required');
        
        if($this->form_validation->run()==FALSE){
            $this->output->set_output(json_encode(array(
                'result'=>0,
                'error'=>$this->form_validation->error_array()
                )));
            
            return FALSE;

        }
        $result=$this->db->insert('todo',array(
            'content'=>$this->input->post('content'),
            'user_id'=>$this->session->userdata('user_id'),
            'date_added'=>$this->input->post('date_added')
        ));
        if($result){
            $query=$this->db->get_where('todo',array('todo_id'=>$this->db->insert_id()));
            $this->output->set_output(json_encode(array(
                'result'=>1,
                'data'=>$query->result()
                )));
            return FALSE;
        }
       $this->output->set_output(json_encode(array(
           'result'=>0,
           'error'=>'could not insert'
           )));
    }
    
//============================================================================================================
    
    public function update_todo(){
        
        $this->_require_login();
        $todo_id=$this->input->post('todo_id');
        $completed=$this->input->post('completed');
        $this->db->where(array('todo_id'=>$todo_id));
        $this->db->update('todo',array(
            'completed'=>$completed
        ));
        $result=$this->db->affected_rows();
        
        if($result){
            $this->output->set_output(json_encode(array('result'=>1)));
            return FALSE;
    }
    $this->output->set_output(json_encode(array('result'=>0)));
    return FALSE;
    }
    
//============================================================================================================
    
    public function delete_todo(){
        
        $this->_require_login();
        $result=$this->db->delete('todo',array(
            'todo_id'=>$this->input->post('todo_id'),
            'user_id'=>$this->session->userdata('user_id')
        ));
        
        if($result){
            $this->output->set_output(json_encode(array('result'=>1)));
            return FALSE;
        }
        $this->output->set_output(json_encode(array(
            'result'=>0,
            'message'=>'could not delete'
        )));
    }
    
}