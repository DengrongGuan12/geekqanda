<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/10/9
 * Time: 19:18
 */
class User_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function insert_user($name,$password,$date){
        $success=1;
        $this->db->select('name');
        $query = $this->db->get('user');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                if($row->name==$name){
                    $success=0;
                    break;
                }
            }
        }
        if($success==0){
            return 0;
        }else{
            $head='default.gif';
            $credit=20;
            $data=array(
                'name'=>$name,
                'password'=>$password,
                'head'=>$head,
                'credit'=>$credit,
                'date'=>$date
            );
            return $this->db->insert('user',$data);
        }




    }
    public function getPasswordByName($name){
        $password='';
        $query = $this->db->get_where('user', array('name' => $name));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $password=$row['password'];
        }
        return $password;

    }
    public function setPasswordByName($name,$new_password){
        $data = array(
            'password'=>$new_password
        );

        $this->db->where('name', $name);
        $this->db->update('user', $data);
    }
    public function getCreditByName($name){
        $credit=0;
        $query = $this->db->get_where('user', array('name' => $name));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $credit=$row['credit'];
        }
        return $credit;

    }
    public function addCreditByName($name,$add){
        $credit=$this->getCreditByName($name)+$add;
        $this->setCreditByName($name,$credit);

    }
    public function setCreditByName($name,$credit){
        $data = array(
            'credit'=>$credit
        );

        $this->db->where('name', $name);
        $this->db->update('user', $data);
    }
    public function getAllUsers($order=""){
        $ids=array();
        if($order=="credit"){
            $query=$this->db->query("select id,credit from user ORDER BY credit desc");

        }else{
            $query=$this->db->query("select id from user ORDER BY id desc");
        }

        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($ids,$row->id);
            }
        }
        return $ids;

    }
    public function getDateById($id){
        $this->db->select('date');
        $query = $this->db->get_where('user', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $date=$row['date'];
        }
        return $date;
    }
    public function getCreditById($id){
        $this->db->select('credit');
        $query = $this->db->get_where('user', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $credit=$row['credit'];
        }
        return $credit;
    }
    public function getNameById($id){
        $this->db->select('name');
        $query = $this->db->get_where('user', array('id' => $id));
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $name=$row['name'];
        }
        return $name;
    }
    public function getUsersByDate($date){
        $ids=array();
        $query=$this->db->query("select id,date from user ORDER BY id desc");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $time=$row->date;
                $time_array=explode(" ",$time);

                if($time_array[0]==$date){
                    array_push($ids,$row->id);
                }
            }
        }
        return $ids;

    }
    public function searchUsers($key=""){
        $ids=array();
        $this->db->select('id');
        $this->db->like('name',$key);
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($ids,$row->id);
            }
        }
        return $ids;


    }
}