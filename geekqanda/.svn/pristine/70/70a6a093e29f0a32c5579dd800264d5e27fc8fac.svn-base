<?php
/**
 * Created by IntelliJ IDEA.
 * User: gdr
 * Date: 2014/10/25
 * Time: 23:18
 */
class Qa_tag_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function insert($qa_id,$tag_id){
        $data=array(
            'qa_id'=>$qa_id,
            'tag_id'=>$tag_id
        );
        $this->db->insert('qa_tag',$data);
    }
    public function getTagIdsByQid($id){
        $tag_ids=array();
        $this->db->where('qa_id',$id);
        $this->db->select('tag_id');
        $query=$this->db->get('qa_tag');
        if ($query->num_rows() > 0){
            foreach($query->result() as $row){
                array_push($tag_ids,$row->tag_id);

            }
        }
        return $tag_ids;
    }

}