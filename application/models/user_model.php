<?php

class User_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

//============================================================================================================
    
    public function get($user_id=null){
        
        if($user_id===null){
        $q=$this->db->get('user');
        }elseif(is_array($user_id)){
            $q=$this->db->get_where('user',$user_id);
        }
        else{
            $q=$this->db->get_where('user',array('user_id'=>$user_id));
        }
        return $q->result_array();
    }
    
//============================================================================================================
    
    public function insert($data){
        
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }
    
//============================================================================================================
    
    public function update($data,$user_id){
        
        $this->db->where(array(
            'user_id'=>$user_id
        ));
        $this->db->update('user',$data);
        return $this->db->affected_rows();
    }
    
//============================================================================================================
    
   
}