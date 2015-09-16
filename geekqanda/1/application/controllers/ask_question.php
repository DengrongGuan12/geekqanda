<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/10/21
 * Time: 14:57
 */
class Ask_question extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');

    }
    public function ask(){
        $status=$this->session->userdata('status');
        if($status!='OK'){
            redirect('pages/loginpage');
        }else{
            $name=$this->session->userdata('name');
            if ( ! file_exists(APPPATH.'/views/ask.php'))
            {
                // 页面不存在
                show_404();
            }
            $data['status']=$status;
            $data['name']=$name;
//            $data['base']=$this->base;
//            $data['css']=$this->css;
//            $data['js']=$this->js;
//            $data['images']=$this->images;
//            $data['heads']=$this->heads;

            $this->load->model('tag_model');
            $data['tags']=$this->tag_model->getAllTags();
            $this->load->model('user_model');
            $data['credit']=$this->user_model->getCreditByName($name);




            $this->load->view('templates/header', $data);
            $this->load->view('ask', $data);
            $this->load->view('templates/footer', $data);
        }
//        $status=$this->session->userdata('status');

    }
    public function getData(){
        $name=$this->session->userdata('name');
        $date=date('Y-m-d H:i:s',time());
        $date_array=explode(" ",$date);
        $this->load->model('user_model');
        $use_credit=$_POST['credit'];
        $credit=$this->user_model->getCreditByName($name);
        $this->load->model('qanda_model');
        //今天发布的问题
        $today_questions_num=count($this->qanda_model->getQidsByNameDate($name,$date_array[0]));
        if($credit<=10){
            if($today_questions_num<2){
                //可以发布问题
                //判断积分足够支付悬赏分，防止浏览器的数据篡改
                if($credit>=$use_credit){
                    //可以发布问题
                    $this->user_model->setCreditByName($name,($credit-$use_credit));
                    $content = $_POST['content'];
//        echo($content);

                    $title=$_POST['title'];
                    $tags=$_POST['tags'];
                    //标签id数组
                    $tags_array=explode(",",$tags);


//        echo($title);


                    $id=$this->qanda_model->insertQuestion($title,$content,$date,$name,$use_credit);
                    $this->load->model('qa_tag_model');
                    foreach($tags_array as $tag_id){
                        $this->qa_tag_model->insert($id,$tag_id);

                    }


//        echo($id);
//                    echo($this->qanda_model->getContentById($id));
                   echo("submit-success");

                }else{
                    echo("submit-error3");
                    //悬赏分高于已有积分不能发布问题
                }
            }else{
                echo("submit-error1");
                //今天不能发布问题
            }
        }else{
            if($today_questions_num<4){
                //
                if($credit>=$use_credit){
                    //可以发布问题
                    $this->user_model->setCreditByName($name,($credit-$use_credit));
                    $content = $_POST['content'];
//        echo($content);

                    $title=$_POST['title'];
//        echo($title);


                    $tags=$_POST['tags'];
                    //标签id数组
                    $tags_array=explode(",",$tags);
                    $id=$this->qanda_model->insertQuestion($title,$content,$date,$name,$use_credit);
                    $this->load->model('qa_tag_model');
                    foreach($tags_array as $tag_id){
                        $this->qa_tag_model->insert($id,$tag_id);

                    }
                    echo("submit-success");
                }else{
                    //悬赏分高于已有积分不能发布问题
                    echo("submit-error3");
                }
            }else{
                echo("submit-error2");

            }
        }



    }
}