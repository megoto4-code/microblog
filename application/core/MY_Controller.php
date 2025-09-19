<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();
        session_start();
        $this->config();
    }

    function config() {
        $this->data['site_name'] = 'Microblog';
        $this->data['site_slogun'] = 'like twitter';
        $this->data['creator'] = 'Surajit Sarma';        
    }

    function _render($view, $data = null, $layout = 'blog_main') {
        $this->form_validation->set_error_delimiters('<div class="alert alert-info">','</div>');
        $data['content'] = $this->load->view($view, $data, TRUE);
        $data['title'] = ucfirst($data['title']);
        $layout = 'layouts/' . $layout;
        $this->load->view($layout, $data);
    }

    function is_logged_in() {
        if (isset($_SESSION['user'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
