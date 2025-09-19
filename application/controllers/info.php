<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info extends My_Controller {
    
    function about() {
        $this->data['title'] = 'about';
        $this->_render('about', $this->data, 'auth');
    }
}
