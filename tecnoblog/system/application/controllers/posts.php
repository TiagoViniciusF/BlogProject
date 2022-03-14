<?php

class posts extends Controller {



    public function blogposts(){
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


    public function index($slug = NULL){

        $this->load->library('parser');
        $data = array(
            
            'url' => 'http://localhost/tecnoblog/',
            'post' =>  $this->post_model->get_posts($slug),

        );
    
        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = $data['post']['title'];
        $data['body'] = $data['post']['body'];
        $data['created_at'] = $data['post']['created_at'];
        $data['post_image'] = $data['post']['post_image'];
        $data['slug'] = $data['post']['slug'];
        $data['id'] = $data['post']['id'];
    

        $this->parser->parse('templates/header',$data);
        $this->parser->parse('posts/index', $data);
        $this->parser->parse('templates/footer', $data);
    }

    public function create(){
        //Check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->load->library('parser');
        $data = array(
            'url' => 'http://localhost/tecnoblog/',
            'title' => 'Criando Post',
            'categories' => $this->post_model->get_categories(),
        );
        
        

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
        

        $this->parser->parse('templates/header',$data);
        $this->parser->parse('posts/create', $data);
        $this->parser->parse('templates/footer', $data);
        } else {
            //upload image
           
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '7048';
            $config['max_width'] = '7000';
            $config['max_height'] = '7000';
          
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
             if(!$this->upload->do_upload('userfile')){
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
               
             }else{
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);

            $this->session->set_flashdata('post_created', 'Seu post foi registrado com secesso');
            redirect('posts');
        }
 
    }

    public function delete($id){
          //Check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
         }
      $this->post_model->delete_post($id);
      $this->session->set_flashdata('post_deleted', 'Post apagado com sucesso');
      redirect('posts');
    }

    public function edit($slug){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
         }
  
         $data = array(
             'url' => 'http://localhost/tecnoblog/',
             'loop_categories' => $this->category_model->get_categories(),
             'post' =>  $this->post_model->get_posts($slug),
         );
         $data['title'] = $data['post']['title'];
         $data['id'] = $data['post']['id'];
         $data['body'] = $data['post']['body'];
         $data['slug'] = $data['post']['slug'];


        //check user
        if($this->session->userdata('user_id')!= $this->post_model->
        get_posts($slug)['user_id']){
            redirect('posts');
        }

         if(empty($data['post'])){
            show_404();
        }
        $this->parser->parse('templates/header',$data);
        $this->parser->parse('posts/edit', $data);
        $this->parser->parse('templates/footer', $data);

    }

    public function update(){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
         }
        $this->post_model->update_post();
        $this->session->set_flashdata('post_updated', 'Post atualizado com sucesso');
        redirect('posts');
    }

    public function about(){

            

        $data = array(
            'url' => 'http://localhost/tecnoblog/',
            'title' => 'Sobre'
        );

    $this->parser->parse('templates/header',$data);
    $this->parser->parse('pages/about', $data);
    $this->parser->parse('templates/footer', $data);
    }
    
}
