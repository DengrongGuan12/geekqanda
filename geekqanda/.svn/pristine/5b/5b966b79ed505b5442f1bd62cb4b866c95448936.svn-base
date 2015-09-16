<?php
/**
 * Created by IntelliJ IDEA.
 * User: gdr
 * Date: 2014/10/31
 * Time: 14:37
 */
class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');

    }
    public function all_users(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/all_users.php'))
        {
            // 页面不存在
            show_404();
        }
        $data['status']=$status;
        $data['name']=$name;

        $this->load->model('user_model');
        $ids=$this->user_model->getAllUsers();
        $credits=array();
        $names=array();
        $dates=array();
        $data['ids']=$ids;
        foreach($ids as $id){
            $dates[$id]=$this->user_model->getDateById($id);
            $credits[$id]=$this->user_model->getCreditById($id);
            $names[$id]=$this->user_model->getNameById($id);
        }
        $data['names']=$names;
        $data['credits']=$credits;
        $data['dates']=$dates;
        $this->load->view('templates/header', $data);
        $this->load->view("all_users", $data);
        $this->load->view('templates/footer', $data);
    }
    public function new_users(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/new_users.php'))
        {
            // 页面不存在
            show_404();
        }
        $data['status']=$status;
        $data['name']=$name;
//        $data['base']=$this->base;
//        $data['css']=$this->css;
//        $data['js']=$this->js;
//        $data['images']=$this->images;
//        $data['heads']=$this->heads;

        $this->load->model('user_model');
        $names=array();
        $dates=array();
        $credits=array();
        $time=date('Y-m-d H:i:s',time());
        $time_array=explode(' ',$time);
        //获取当天注册的新用户
        $ids=$this->user_model->getUsersByDate($time_array[0]);

        foreach($ids as $id){
            $dates[$id]=$this->user_model->getDateById($id);
            $credits[$id]=$this->user_model->getCreditById($id);
            $names[$id]=$this->user_model->getNameById($id);
        }
        $data['ids']=$ids;
        $data['dates']=$dates;
        $data['credits']=$credits;
        $data['names']=$names;
        $this->load->view('templates/header', $data);
        $this->load->view("new_users", $data);
        $this->load->view('templates/footer', $data);
    }
    public function users_of_more_credit(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/users_of_more_credit.php'))
        {
            // 页面不存在
            show_404();
        }
        $data['status']=$status;
        $data['name']=$name;
//        $data['base']=$this->base;
//        $data['css']=$this->css;
//        $data['js']=$this->js;
//        $data['images']=$this->images;
//        $data['heads']=$this->heads;

        $this->load->model('user_model');
        $ids=$this->user_model->getAllUsers("credit");
        $names=array();
        $credits=array();
        $dates=array();
        foreach($ids as $id){
            $dates[$id]=$this->user_model->getDateById($id);
            $names[$id]=$this->user_model->getNameById($id);
            $credits[$id]=$this->user_model->getCreditById($id);
        }

        $data['names']=$names;
        $data['credits']=$credits;
        $data['dates']=$dates;
        $data['ids']=$ids;

        $this->load->view('templates/header', $data);
        $this->load->view("users_of_more_credit", $data);
        $this->load->view('templates/footer', $data);
    }
}