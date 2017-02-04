<?php
/**
 * Created by PhpStorm.
 * User: eye
 * Date: 2017/02/04
 * Time: 22:55
 */

class Api_post extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        $this->load->view('upload_form', array('error' => ' '));
    }

    function up_voice()
    {
        $config['upload_path'] = '/var/www/Hackday2017/htdocs/uploads/';
        $config['allowed_types'] = 'mp4|ogg|wav';
        $config['max_size'] = '300';
//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }

}
