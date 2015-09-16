<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/10/22
 * Time: 21:16
 */
class Tag_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function getAllTagNames(){
        $names=array();
        $this->db->select("name");
        $query=$this->db->get("tag");
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                array_push($names,$row->name);
//                echo $row->id;
            }
        }
        return $names;
    }
    public function getAllTags(){
        $tags=array();
        $query=$this->db->get("tag");
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tags[$row->id]=$row->name;

            }
        }
        return $tags;
    }
    public function getNameById($id){
        $this->db->select("name");
        $this->db->where("id",$id);
        $query=$this->db->get("tag");
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $name=$row['name'];
        }
        return $name;
    }
}