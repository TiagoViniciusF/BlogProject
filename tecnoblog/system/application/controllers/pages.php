<?php

class pages extends Controller {






    function index(){
        $this->load->library('parser');

        
        $data = array(
            'url' => 'http://localhost/tecnoblog/',
            'loop_categories' => $this->category_model->get_categories(),
            'loop_posts' =>  $this->post_model->get_posts(),
            'posts' =>  $this->post_model->get_posts(),
             
            );

      
            

        $this->parser->parse('templates/header',$data);
        $this->parser->parse('posts/blogposts', $data);
        $this->parser->parse('templates/footer', $data);
    }
}