<?php

require_once 'inc/common_controller.php';

class Home extends Common_controller {

    function __construct() {
        parent::__construct();
        //echo '<pre>';print_r($this->data['comments']);echo '</pre>';
    }

    function index() {
        $this->data['title'] = 'home';
        $this->_render('home', $this->data, 'blog_main');
    }

    function post_new() {
        $this->main_model->post_new($this->data['id']);
        redirect('/home');
    }

    function post_comment($post_id) {
        if (isset($post_id)) {
            $this->main_model->post_comment($post_id, $this->data['id']);
        }
        redirect('/home');
    }

    function followers() {
        $this->data['title'] = 'followers';
        $this->data['followers'] = $this->main_model->get_followers($this->data['id']);
        $this->_render('followers', $this->data, 'blog_main');
    }

    function logout() {
        session_destroy();
        session_start();
        $_SESSION['msg1'] = 'You are logged out successfully';
        redirect('/');
    }

}
