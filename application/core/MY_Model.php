<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('POSTS', '1');
define('COMMENTS', '2');
define('PROFILES', '3');
define('PAGES', '4');

class MY_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_id($username = 0) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $id = $row->id;
            }
            return $id;
        } else {
            return 'No ID is found.';
        }
    }

    function get_username($id = 1) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $username = $row->username;
            }
            return $username;
        } else {
            return 'No Username is found.';
        }
    }

}
