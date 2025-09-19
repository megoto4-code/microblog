<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        if ($this->is_logged_in() == FALSE) {
            redirect('auth/login');
        }
        $this->load->model('main_model');
        $this->data['username'] = $_SESSION['user'];
        $this->data['id'] = $this->main_model->get_id($_SESSION['user']);
        $this->data['total_followers'] = $this->main_model->total_followers($this->data['id']);
        $this->data['total_followings'] = $this->main_model->total_followings($this->data['id']);
        $this->data['total_unseen_messages'] = $this->main_model->total_unseen_messages($this->data['id']);
        $this->data['total_posts'] = $this->main_model->total_posts($this->data['id']);
        $this->data['posts'] = $this->main_model->get_posts($this->data['id']);        
        $this->data['comments'] = $this->main_model->get_comments($this->data['id']);
    }

    function likes($item_id, $type, $page) {
        $this->main_model->like($item_id, $type, $this->data['id']);
        redirect($page);
    }

}
