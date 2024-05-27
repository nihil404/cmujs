<?php

class Posts_model extends CI_Model{
    
    public function create_post() {
        $slug = url_title($this->input->post('title'));

        $data = array (
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'abstract' => $this->input->post('body'),
            'keywords' => $this->input->post('keywords'),
            'filename' => $upload_data['file'] 

        );

        return $this->db->insert('articles', $data);
    }

    public function get_posts($id_or_slug) {
        // Assuming $id_or_slug is either the ID or the slug of the post
        if (is_numeric($id_or_slug)) {
            // If $id_or_slug is numeric, assume it's the ID
            $this->db->where('articleid', $articleid);
        } else {
            // If $id_or_slug is not numeric, assume it's the slug
            $this->db->where('title', $slug);
        }
        
        $query = $this->db->get('articles');
        $post = $query->row(); // Fetch the post object
    
        // Check if the post object is empty (null) and return null if no post is found
        if (empty($post)) {
            return null;
        }
    
        return $post; // Return the post object
    }
    
    

    
}

