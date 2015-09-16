<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/10/15
 * Time: 16:33
 */
class Qanda_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function getQidByName($name="",$limit=""){
        $ids=array();
        $this->db->where('user_name',$name);
        $this->db->where('to_id',0);
        $this->db->select('id');
        $this->db->order_by("id", "desc");
        if($limit==""){
            $query = $this->db->get('qanda', 4, 0);
        }else if($limit=="all"){
            $query = $this->db->get('qanda');
        }

//        $query = $this->db->get_where('qanda', array('name=' => $name));
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                array_push($ids,$row->id);
//                echo $row->id;
            }
        }
        return $ids;
    }
    public function getTitleById($id=0){
        $this->db->select('title');
        $query = $this->db->get_where('qanda', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $title=$row['title'];
        }
        return $title;

    }
    public function getContentById($id=0){
        $this->db->select('content');
        $query = $this->db->get_where('qanda', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $content=$row['content'];
        }
        return $content;

    }
    public function getTo_idByName($name,$limit=""){
        $to_ids=array();
        if($limit==""){
            $query = $this->db->query("SELECT id, to_id FROM qanda WHERE user_name = '$name' AND to_id!= 0 ORDER BY id desc LIMIT 4");
        }else if($limit=="all"){
            $query = $this->db->query("SELECT id, to_id FROM qanda WHERE user_name = '$name' AND to_id!= 0 ORDER BY id desc");
        }
        //        $this->db->where('user_name',$name);
//        $this->db->where('to_id!=',0);
//        $this->db->select('id,to_id');
//        $this->db->order_by("id", "desc");
//        $query = $this->db->get('qanda', 4, 0);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $to_ids[$row->id]=$row->to_id;
//                echo $row->id;
            }
        }
        return $to_ids;


    }
    //循环查找直到找到问题id
    public function getQidByTo_id($to_id){
        while(TRUE){
            $id=$to_id;
            $this->db->where('id',$to_id);
            $this->db->select('to_id');
            $query=$this->db->get('qanda');
            if ($query->num_rows() > 0)
            {
                $row = $query->row_array();
                $to_id=$row['to_id'];
            }
            if($to_id==0){
                break;
            }
        }
        return $id;


    }
    public function getCreditById($id){
        $this->db->select('credit');
        $query = $this->db->get_where('qanda', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $credit=$row['credit'];
        }
        return $credit;

    }
    //获取第一层的所有回答的id和内容
    public function getAnswersByTo_id($id){
        $answers=array();
        $this->db->select('id,content');
        $query = $this->db->get_where('qanda', array('to_id' => $id));
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $answers[$row->id]=$row->content;
//                echo $row->id;
            }

        }
        return $answers;

    }
    public function getIfEndById($id){
        $this->db->select('end');
        $query = $this->db->get_where('qanda', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $end=$row['end'];
        }
        return $end;
    }
    public function deleteById($id){
        $this->db->where('id', $id);
        $this->db->delete('qanda');
    }
    public function getUserById($id){
        $this->db->select('user_name');
        $query = $this->db->get_where('qanda', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $user_name=$row['user_name'];
        }
        return $user_name;
    }
    public function setEndById($qid,$aid){
        $data = array(
            'end'=>$aid
        );

        $this->db->where('id', $qid);
        $this->db->update('qanda', $data);
    }
    public function getDateById($id){
        $this->db->select('date');
        $query = $this->db->get_where('qanda', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $date=$row['date'];
        }
        return $date;
    }
    //插入问题，如果成功返回问题id,如果失败（根据积分判断上传权限）返回0
    public function insertQuestion($title,$content,$date,$user_name,$credit){

//        echo($content);
        $data=array(
            "title"=>$title,
            "content"=>$content,
            "date"=>$date,
            "user_name"=>$user_name,
            "credit"=>$credit
        );
        $this->db->insert('qanda',$data);
        $query = $this->db->query("SELECT LAST_INSERT_ID() as id from qanda");
        if($query->num_rows()>0){
            $row=$query->row_array();
            $id=$row['id'];
        }
        return $id;


    }
    //获取某人某天发布的问题id
    public function getQidsByNameDate($name,$date){
        $ids=array();
        $this->db->where('user_name',$name);
        //$this->db->where('date',$date);
        $this->db->where('to_id',0);
        $this->db->select('id,date');
        $query = $this->db->get('qanda');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                if($date==explode(" ",$row->date)[0]){
                    array_push($ids,$row->id);
                }

//                echo $row->id;
            }
        }
        return $ids;

    }
    public function getAllQids(){
        $ids=array();
        $query=$this->db->query("SELECT id from qanda where to_id=0 ORDER BY id desc");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($ids,$row->id);
            }
        }
        return $ids;
    }
    //获取所有不为0的to_id
    public function getAllTo_ids(){
        $to_ids=array();
        $query = $this->db->query("SELECT to_id FROM qanda WHERE to_id!= 0");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($to_ids,$row->to_id);
            }
        }
        return $to_ids;
    }

    public function insertAnswer($content,$user_name,$qid){
        $date=date('Y-m-d H:i:s',time());
        $data=array(
            "content"=>$content,
            "date"=>$date,
            "user_name"=>$user_name,
            "to_id"=>$qid
        );
        $this->db->insert('qanda',$data);


    }
    //获取所有尚未结帖的问题id
    public function getAllNoEndQids(){
        $ids=array();
        $query=$this->db->query("select id from qanda where to_id=0 AND end=0 ORDER BY id desc");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($ids,$row->id);
            }
        }
        return $ids;

    }

    public function searchQA($key=""){
        $ids=array();
        $this->db->select('id');
        $this->db->like('title',$key);
        $this->db->or_like('content',$key);
        $query=$this->db->get('qanda');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($ids,$row->id);
            }
        }
        return $ids;

    }
    public function isQuestion($id){
        $isQuestion=1;
        $this->db->select('to_id');
        $query = $this->db->get_where('qanda', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $to_id=$row['to_id'];
        }
        if($to_id!=0){
            $isQuestion=0;
        }
        return $isQuestion;

    }
    public function getQidById($id){
        $qid=0;
        while(TRUE){
            $this->db->where('id',$id);
            $this->db->select('to_id');
            $query=$this->db->get('qanda');
            if ($query->num_rows() > 0)
            {
                $row = $query->row_array();
                $to_id=$row['to_id'];
            }
            if($to_id==0){
                $qid=$id;
                break;
            }else{
                $id=$to_id;
            }
        }
        return $qid;
    }

}
?>