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
        $date=date('Y-m-d H:i:s',time());
        $data = array(
            'user_name' => $name ,
            'id' => $id,
            'date' =>$date
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
    //返回排好序(将问题和答案的赞数累加在一起)的问题id
    public function getHotQids(){
        $qid_praises=array();
        $this->load->model('qanda_model');
        //$this->db->select('user_name,id');
        $query=$this->db->query("SELECT id,COUNT(*) as praise_count FROM praise GROUP BY id order by praise_count desc");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $qid=$this->qanda_model->getQidById($row->id);
                if(array_key_exists($qid,$qid_praises)){
                    $qid_praises[$qid]+=$row->praise_count;
                }else{
                    $qid_praises[$qid]=$row->praise_count;
                }
            }
        }
        return $qid_praises;


    }

    //获取问题id及和他回答对应的这个月的总赞数
    public function getQidPraiseInMonth(){
        $qid_praises=array();
        $month=$this->getMonth(date('Y-m-d H:i:s',time()));
        $query=$this->db->get('praise');
        $this->load->model('qanda_model');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $qid=$this->qanda_model->getQidById($row->id);
                if(array_key_exists($qid,$qid_praises)){
                    $temp_month=$this->getMonth($row->date);
                    if($temp_month==$month){
                        $qid_praises[$qid]++;
                    }else{
                        continue;
                    }

                }else{
                    $temp_month=$this->getMonth($row->date);
                    if($temp_month==$month){
                        $qid_praises[$qid]=1;
                    }else{
                        $qid_praises[$qid]=0;
                    }
                }
            }
        }

        return $qid_praises;
    }
    //获取问题id及和他回答对应的这个月的总赞数
    public function getQidPraiseInWeek(){
        $qid_praises=array();
//        $month=$this->getMonth(date('Y-m-d H:i:s',time()));
        $query=$this->db->get('praise');
        $this->load->model('qanda_model');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $qid=$this->qanda_model->getQidById($row->id);
                if(array_key_exists($qid,$qid_praises)){
                    $temp_date=$row->date;
                    if($this->sameWeek($temp_date)){
                        $qid_praises[$qid]++;
                    }else{
                        continue;
                    }

                }else{
                    $temp_date=$row->date;
                    if($this->sameWeek($temp_date)){
                        $qid_praises[$qid]=1;
                    }else{
                        $qid_praises[$qid]=0;
                    }
                }
            }
        }

        return $qid_praises;
    }
    //这个月
    private function getMonth($time){
        $time_array=explode(" ",$time);
        $date=$time_array[0];
        $date_array=explode("-",$date);
        $month=$date_array[0].'-'.$date_array[1];
        return $month;
    }
    //判断给定日期和当前日期是否在同一周
    private function sameWeek($time){
//        echo($time."<br />");
        $inSameWeek=0;
        $gdate = date("Y-m-d");
//        echo($gdate);
        $w = date("w", strtotime($gdate));//取得一周的第几天,星期天开始0-6
        $dn = $w ? $w - 0 : 6;//要减去的天数
        $st =  strtotime("$gdate -".$dn." days");
        $st_date=date("Y-m-d",$st);
        $en =  strtotime("$st_date +6 days");
//        $en_date=date("Y-m-d",$en);
//        echo($st_date);
//        echo("st:".$st."<br />");
//        echo($en_date);
//        echo("en:".$en."<br />");
        $time_array=explode(" ",$time);
        $t=strtotime($time_array[0]);
//        echo($time_array[0]);
//        echo("t:".$t."<br />");
        if($t>=$st&&$t<=$en){
//            echo("inSameweek");
            $inSameWeek=1;
        }
        return $inSameWeek;
    }



}