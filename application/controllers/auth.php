<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MY_Controller {

    function __construct() {
        parent::__construct();
        if($this->is_logged_in()) {
            redirect('/');
        }
        $this->load->model('auth_model');
    }

    function login() {
        $this->data['title'] = 'user login';

        // validation rules:
        $this->form_validation->set_rules('username', 'Username', 'required|callback__username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->_render('auth/login', $this->data, 'auth');
        } else {
            $_SESSION['user'] = $this->input->post('username');
            redirect('/');
        }
    }

    function create_user() {
        $this->data['title'] = 'create user';

        // validation rules:
        $this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('secondname', 'Second Name', 'required|alpha');
        $this->form_validation->set_rules('username', 'Username', 'required|valid_email|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[rpassword]');
        $this->form_validation->set_rules('month', 'Month', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->_render('auth/create_user', $this->data, 'auth');
        } else {
            if ($this->auth_model->create_user() == TRUE) {
                $_SESSION['msg1'] = 'Your account is successfully created';
                redirect('auth/login');
            }
        }
    }
    
    function forgot_password() {
        $this->data['title'] = 'forgot_password';
        $this->_render('auth/forgot_password', $this->data, 'auth');
    }

    function _username_check($str) {
        if ($this->auth_model->username_check($str) == FALSE) {
            $this->form_validation->set_message('_username_check', 'Incorrect Username');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
