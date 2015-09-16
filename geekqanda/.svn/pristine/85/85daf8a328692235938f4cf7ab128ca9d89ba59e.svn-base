<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/10/15
 * Time: 21:10
 */
class Question extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');


    }

    public function single_question($id=0){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/single_question.php'))
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

        $this->load->model('qa_tag_model');
        $tags=array();
        $q_count_of_tag=array();
        $tag_ids=$this->qa_tag_model->getTagIdsByQid($id);
        $this->load->model("tag_model");
        foreach($tag_ids as $tag_id){
            $tags[$tag_id]=$this->tag_model->getNameById($tag_id);
            $q_count_of_tag[$tag_id]=count($this->qa_tag_model->getQidsByTagid($tag_id));
        }
        $data['tags']=$tags;
        $data['q_count_of_tag']=$q_count_of_tag;
        $this->load->model('qanda_model');
        $data['id']=$id;
        $data['publisher']=$this->qanda_model->getUserById($id);
        $data['title']=$this->qanda_model->getTitleById($id);
        $data['content']=$this->qanda_model->getContentById($id);
        $data['credit']=$this->qanda_model->getCreditById($id);
        $data['end']=$this->qanda_model->getIfEndById($id);
        $no_agree_answers=array();
        $answers=$this->qanda_model->getAnswersByTo_id($id);
        $this->load->model('praise_model');
        $data['ifPraise']=$this->praise_model->ifPraise($name,$id);
        foreach(array_keys($answers) as $aid){
            $content=$answers[$aid];
            if($aid==$data['end']){
                $data['agree_answer']=array($this->praise_model->ifPraise($name,$aid),$content,$this->qanda_model->getUserById($aid),$this->praise_model->getNameCountById($aid));
                continue;
            }

            $no_agree_answers[$aid]=array($this->praise_model->ifPraise($name,$aid),$content,$this->qanda_model->getUserById($aid),$this->praise_model->getNameCountById($aid));
        }
        //尚未被认同的答案
        $data['no_agree_answers']=$no_agree_answers;
        $data['answer_count']=count($answers);

        $data['praise_count']=$this->praise_model->getNameCountById($id);


        $this->load->view('templates/header', $data);
        $this->load->view('single_question', $data);
        $this->load->view('templates/footer', $data);

    }
    public function cancel_praiseQ($id){
        if($this->session->userdata('status')!='OK'){
            redirect('pages/loginpage');
        }else{
            $name=$this->session->userdata('name');
            $this->load->model('praise_model');
            $this->praise_model->deleteByNameId($name,$id);
            redirect('question/single_question/'.$id);
        }

    }
    public function cancel_praiseA($aid,$qid){
        if($this->session->userdata('status')!='OK'){
            redirect('pages/loginpage');
        }else{
            $name=$this->session->userdata('name');
            $this->load->model('praise_model');
            $this->praise_model->deleteByNameId($name,$aid);
            redirect('question/single_question/'.$qid);
        }

    }
    public function praiseQ($id){
        if($this->session->userdata('status')!='OK'){
            redirect('pages/loginpage');
        }else{
            $name=$this->session->userdata('name');
            $this->load->model('praise_model');
            $this->praise_model->insert($name,$id);
            redirect('question/single_question/'.$id);
        }

    }
    public function praiseA($aid,$qid){
        if($this->session->userdata('status')!='OK'){
            redirect('pages/loginpage');
        }else{
            $name=$this->session->userdata('name');
            $this->load->model('praise_model');
            $this->praise_model->insert($name,$aid);
            redirect('question/single_question/'.$qid);
        }


    }
    public function delete_my_question($id){
        if($this->session->userdata('status')!='OK'){
            redirect('pages/loginpage');
        }else{
            $name=$this->session->userdata('name');
            $this->load->model('qanda_model');
            $credit=$this->qanda_model->getCreditById($id);
            $this->load->model('user_model');
            $this->user_model->addCreditByName($name,$credit);
            $this->qanda_model->deleteById($id);
            $this->load->model('praise_model');
            $this->praise_model->deleteById($id);
            $this->load->model('qa_tag_model');
            $this->qa_tag_model->deleteByQid($id);
            redirect("pages/myinfo/");
        }


    }
    public function agree($qid,$aid){
        if($this->session->userdata('status')!='OK'){
            redirect('pages/loginpage');
        }else{
            $this->load->model('qanda_model');
            $this->qanda_model->setEndById($qid,$aid);
            $this->load->model('user_model');
            $this->user_model->addCreditByName($this->qanda_model->getUserById($aid),$this->qanda_model->getCreditById($qid));
            redirect("question/single_question/".$qid);
        }


    }
    public function my_all_questions(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/my_all_questions.php'))
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


        $this->load->model('qanda_model');
//        $ids=array();
        $titles=array();
        $contents=array();
        $dates=array();
        $ids=$this->qanda_model->getQidByName($name,'all');
        foreach($ids as $id){
            $titles[$id]=$this->qanda_model->getTitleById($id);
            $contents[$id]=$this->qanda_model->getContentById($id);
            $dates[$id]=$this->qanda_model->getDateById($id);
//            array_push($titles,$this->qanda_model->getTitleById($id));
//            array_push($contents,$this->qanda_model->getQContentById($id));

        }
        $data['ids']=$ids;
        $data['titles']=$titles;
        $data['contents']=$contents;
        $data['dates']=$dates;
        $this->load->view('templates/header', $data);
        $this->load->view('my_all_questions', $data);
        $this->load->view('templates/footer', $data);


    }
    public function my_all_answers(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/my_all_answers.php'))
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

        $this->load->model('qanda_model');
        $to_ids=$this->qanda_model->getTo_idByName($name,"all");
        $i=0;
        //回答的内容
        $Acontents=array();
        //回答的问题的id
        $AqIds=array();
        //回答的时间
        $Adates=array();
        foreach(array_keys($to_ids) as $id){
            $Acontents[$i]=$this->qanda_model->getContentById($id);
            $Adates[$i]=$this->qanda_model->getDateById($id);
            $AqIds[$i]=$this->qanda_model->getQidByTo_id($to_ids[$id]);
            $i=$i+1;

//            array_push($Acontents,$this->qanda_model->getContentById($id));

//            $Acontent[$this->qanda_model->getQidByTo_id($to_ids[$id])]=$this->qanda_model->getContentById($id);
        }
        $data['AqIds']=$AqIds;
        $data['Acontents']=$Acontents;
        $data['Adates']=$Adates;
        $this->load->view('templates/header', $data);
        $this->load->view('my_all_answers', $data);
        $this->load->view('templates/footer', $data);

    }
    public function no_answer_questions(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/no_answer_questions.php'))
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

        $this->load->model('qanda_model');
        //记录尚未有回答的问题id
        $no_answer_qids=array();
        $qids=$this->qanda_model->getAllQids();
        $to_ids=$this->qanda_model->getAllTo_ids();
        foreach($qids as $qid){
            $has_answer=0;
            foreach($to_ids as $to_id){
                if($qid==$to_id){
                    $has_answer=1;
                    break;
                }
            }
            if($has_answer==0){
                array_push($no_answer_qids,$qid);
            }

        }
        $title=array();
        $date=array();
        $user=array();
        foreach($no_answer_qids as $id){
            $title[$id]=$this->qanda_model->getTitleById($id);
            $date[$id]=$this->qanda_model->getDateById($id);
            $user[$id]=$this->qanda_model->getUserById($id);
        }
        $data['ids']=$no_answer_qids;
        $data['titles']=$title;
        $data['dates']=$date;
        $data['users']=$user;


        $this->load->view('templates/header', $data);
        $this->load->view('no_answer_questions', $data);
        $this->load->view('templates/footer', $data);




    }
    public function no_end_questions(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/no_end_questions.php'))
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

        $this->load->model("qanda_model");
        $qids=$this->qanda_model->getAllNoEndQids();
        $titles=array();
        $dates=array();
        $users=array();
        foreach($qids as $qid){
            $titles[$qid]=$this->qanda_model->getTitleById($qid);
            $dates[$qid]=$this->qanda_model->getDateById($qid);
            $users[$qid]=$this->qanda_model->getUserById($qid);

        }
        $data['ids']=$qids;
        $data['titles']=$titles;
        $data['users']=$users;
        $data['dates']=$dates;

        $this->load->view('templates/header', $data);
        $this->load->view('no_end_questions', $data);
        $this->load->view('templates/footer', $data);


    }

    public function hot_questions(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/hot_questions.php'))
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


        $this->load->model("praise_model");
        $this->load->model("qanda_model");
        //有赞的问题
        $qid_praises=$this->praise_model->getHotQids();
        //无赞的问题
        $qids=$this->qanda_model->getAllQids();
        foreach($qids as $qid){
            if(!array_key_exists($qid,$qid_praises)){
                $qid_praises[$qid]=0;
            }
        }
        $titles=array();
        $dates=array();
        $users=array();
        foreach(array_keys($qid_praises) as $qid){
            $titles[$qid]=$this->qanda_model->getTitleById($qid);
            $dates[$qid]=$this->qanda_model->getDateById($qid);
            $users[$qid]=$this->qanda_model->getUserById($qid);

        }

        $data['qid_praises']=$qid_praises;
        $data['titles']=$titles;
        $data['users']=$users;
        $data['dates']=$dates;

        $this->load->view('templates/header', $data);
        $this->load->view('hot_questions', $data);
        $this->load->view('templates/footer', $data);
    }
    //月最热
    public function more_praise_in_month(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/more_praise_in_month.php'))
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

        $this->load->model('praise_model');
        $this->load->model('qanda_model');
        //有赞的问题
        $qid_praises=$this->praise_model->getQidPraiseInMonth();
        $this->load->model('sort');
        $sorted_qids=$this->sort->quick_sort(array_keys($qid_praises),$qid_praises);
        //无赞的问题
        $qids=$this->qanda_model->getAllQids();
        foreach($qids as $qid){
            if(!array_key_exists($qid,$qid_praises)){
                $qid_praises[$qid]=0;
                array_push($sorted_qids,$qid);
            }
        }
        $titles=array();
        $dates=array();
        $users=array();
        foreach(array_keys($qid_praises) as $qid){
            $titles[$qid]=$this->qanda_model->getTitleById($qid);
            $dates[$qid]=$this->qanda_model->getDateById($qid);
            $users[$qid]=$this->qanda_model->getUserById($qid);

        }
        $data['sorted_qids']=$sorted_qids;
        $data['qid_praises']=$qid_praises;
        $data['titles']=$titles;
        $data['users']=$users;
        $data['dates']=$dates;

        $this->load->view('templates/header', $data);
        $this->load->view('more_praise_in_month', $data);
        $this->load->view('templates/footer', $data);
    }
    //周最热
    public function more_praise_in_week(){
        $status=$this->session->userdata('status');
        $name=$this->session->userdata('name');
        if ( ! file_exists(APPPATH.'/views/more_praise_in_week.php'))
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

        $this->load->model('praise_model');
        $this->load->model('qanda_model');
        //有赞的问题
        $qid_praises=$this->praise_model->getQidPraiseInWeek();
        $this->load->model('sort');
        $sorted_qids=$this->sort->quick_sort(array_keys($qid_praises),$qid_praises);
        //无赞的问题
        $qids=$this->qanda_model->getAllQids();
        foreach($qids as $qid){
            if(!array_key_exists($qid,$qid_praises)){
                $qid_praises[$qid]=0;
                array_push($sorted_qids,$qid);
            }
        }
        $titles=array();
        $dates=array();
        $users=array();
        foreach(array_keys($qid_praises) as $qid){
            $titles[$qid]=$this->qanda_model->getTitleById($qid);
            $dates[$qid]=$this->qanda_model->getDateById($qid);
            $users[$qid]=$this->qanda_model->getUserById($qid);

        }

        $data['sorted_qids']=$sorted_qids;
        $data['qid_praises']=$qid_praises;
        $data['titles']=$titles;
        $data['users']=$users;
        $data['dates']=$dates;

        $this->load->view('templates/header', $data);
        $this->load->view('more_praise_in_week', $data);
        $this->load->view('templates/footer', $data);
    }


}