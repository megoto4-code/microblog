<?php

require_once 'inc/common_controller.php';

class Profile extends Common_controller {
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['title'] = 'Profile';
        $this->_render('profile', $this->data, 'blog_main');
    }

}
