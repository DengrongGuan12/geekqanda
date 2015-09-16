<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/9/24
 * Time: 20:52
 */
class Smileys extends CI_Controller {
    var $base;
    var $smileys;

    function __construct()
    {
        parent::__construct();
        $this->smileys=$this->config->item('smileys');
        $this->base=$this->config->item('base_url');
        $this->load->helper('form');
        $this->load->helper('smiley');
        $this->load->library('table');
    }

    function index()
    {


        $image_array = get_clickable_smileys("$this->base/$this->smileys", "comments");

        $col_array = $this->table->make_columns($image_array, 8);

        $data['smiley_table'] = $this->table->generate($col_array);
        $data['base']=$this->base;
        $data['smileys']=$this->smileys;

        $this->load->view('smiley_view', $data);
    }
    function show_smiles(){
        $data['content']=parse_smileys($_POST['comments'], "$this->base/$this->smileys");
        $this->load->view('smiley_show',$data);



    }

}
?>