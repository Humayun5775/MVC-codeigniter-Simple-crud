<?php
class User_model extends CI_model{
    
    function createimg($path,$post){
        $data = array( 
            'name' => $post['name'], 
            'email' => $post['email'], 
            'img'=>$path 
        ); 
       // echo $post['name'];
       // echo $post['email'] ;
        //echo $path;exit;
        $this->db->insert('tb2',$data); // insert in db
    }
    
    function create($formArray)
    {
        $this->db->insert('tb2',$formArray); // insert in db
    }

    function all()
    {
       return $users =  $this->db->get('tb2')->result_array(); // select all from db
    }

    function getUser($userid)
    {
        $this->db->where('id',$userid);
        return $user =  $this->db->get('tb2')->row_array();
    }

    function updateUser($userid,$formArray){
        $this->db->where('id',$userid);
        $this->db->update('tb2',$formArray);  //update user
    }

    
    function deleteUser($userid){
        $this->db->where('id',$userid);
        $this->db->delete('tb2');  //delete  user
    }
}

?>