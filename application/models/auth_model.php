<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function username_check($str) {
        $this->db->where('username', $str);
        $this->db->where('type', 2); // 2 is normal user type
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return TRUE;
        }
    }

    function create_user() {
        $data = array(
            'fname' => $this->input->post('firstname'),
            'lname' => $this->input->post('secondname'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'dob' => $this->input->post('year') . '-' .
            $this->input->post('month') . '-' .
            $this->input->post('day'),
            'type' => 2, // 1 means normal user type
            'gender' => $this->input->post('gender'),
        );
        if ($this->db->insert('users', $data)) {
            if ($this->initialize_user($this->get_id($this->input->post('username')))) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function initialize_user($id) {
        $data = array(
            'profile' => $id,
            'follower' => $id,
        );
        if ($this->db->insert('follows', $data)) {
            if ($this->initial_posts($id)) {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    function initial_posts($id) {
        $data = array(
            'profile' => 1,
            'to' => $id,
            'title' => 'Test Post',
            'post' => 'Welcome ' . $this->get_username($id) . ' to this microblogging software. This is a test post. This provides an basic example of micropost.',
        );
        if ($this->db->insert('posts', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
