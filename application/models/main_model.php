<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function total_posts($id) {
        $this->db->where('to', $id);
        return $this->db->get('posts')->num_rows();
    }

    function total_followers($id) {
        $this->db->where('follower', $id);
        return $this->db->get('follows')->num_rows();
    }

    function total_followings($id) {
        $this->db->where('profile', $id);
        return $this->db->get('follows')->num_rows();
    }

    function total_unseen_messages($id) {
        $this->db->where('to', $id);
        return $this->db->get('messages')->num_rows();
    }

    function get_followers($id) {
        $this->db->where('profile', $id);
        return $this->db->get('follows')->result();
    }

    function get_followings($id) {
        $this->db->where('follower', $id);
        return $this->db->get('follows')->result();
    }

    function get_messages($id) {
        $this->db->where('from', $id);
        return $this->db->get('messages')->result();
    }

    function get_posts($id) {
        $this->db->where('to', $id);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('posts');
        $data = $query->result();
        foreach ($query->result() as $row) {
            $row->profile = $this->get_username($row->profile);
            $row->liked = $this->_is_liked($row->id, $id, POSTS);
        }
        return $data;
    }

    function post_new($user_id) {
        $data = array(
            'profile' => $user_id,
            'to' => $user_id,
            'title' => $this->input->post('new_post_title'),
            'post' => $this->input->post('new_post'),
        );
        $this->db->insert('posts', $data);
    }

    function post_comment($post_id, $user_id) {
        $data = array(
            'post_id' => $post_id,
            'user_id' => $user_id,
            'comment' => $this->input->post('comment_box_' . $post_id),
        );
        $this->db->insert('comments', $data);
    }

    function get_comments($user_id) {
        $query = $this->db->get('comments');
        $data = $query->result();
        foreach ($query->result() as $row) {
            $row->user_id = $this->get_username($user_id);
            $row->liked = $this->_is_liked($row->id, $user_id, COMMENTS);
        }
        return $data;
    }

    function set_likes($id, $table) {
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        foreach ($query->result() as $row) {
            $likes = $row->likes;
        }
        $likes++; // Increment likes
        $data = array(
            'likes' => $likes,
        );
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function like($item_id, $type, $user_id) {
        $id = uniqid();
        if ($type == POSTS) {
            $this->set_likes($item_id, 'posts');
        } elseif ($type == COMMENTS) {
            $this->set_likes($item_id, 'comments');
        } elseif ($type == PROFILES) {
            $this->set_likes($item_id, 'profiles');
        } elseif ($type == PAGES) {
            $this->set_likes($item_id, 'pages');
        }
        $data1 = array(
            'id' => $id,
            'type' => $type,
            'item_id' => $item_id,
        );
        $data2 = array(
            'user_id' => $user_id,
            'item_id' => $id,
        );
        $this->db->insert('liked_items', $data1);
        $this->db->insert('likes', $data2);
    }

    function _is_liked($post_id, $user_id, $type) {
        $this->db->where('type', $type);
        $this->db->where('item_id', $post_id);
        foreach ($this->db->get('liked_items')->result() as $row) {
            $this->db->where('item_id', $row->id);
            $query = $this->db->get('likes');
            foreach ($query->result() as $row) {
                if ($row->user_id == $user_id) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

}
