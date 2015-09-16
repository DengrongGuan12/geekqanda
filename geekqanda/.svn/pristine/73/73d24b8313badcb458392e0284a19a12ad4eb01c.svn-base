<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/10/16
 * Time: 21:07
 */
class Praise_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function ifPraise($name,$id){
        $this->db->where('user_name',$name);
        $this->db->where('id',$id);
        $query = $this->db->get('praise');
        if($query->num_rows()>0) {
            return 1;
        }else{
            return 0;
        }
    }
    public function deleteByNameId($name,$id){
        $this->db->where('user_name',$name);
        $this->db->where('id', $id);

        $this->db->delete('praise');

    }
    public function insert($name,$id){
        $data = array(
            'user_name' => $name ,
            'id' => $id
        );

        $this->db->insert('praise', $data);
    }
    public function getNameCountById($id){
        $count=0;
        $this->db->where('id',$id);
        $this->db->select('user_name');
        $query = $this->db->get('praise');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $count=$count+1;
            }

        }
        return $count;

    }
    public function deleteById($id){
        $this->db->where('id', $id);

        $this->db->delete('praise');
    }

}