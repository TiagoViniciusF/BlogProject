<?php

class posts extends Controller {



    function blogposts(){

        $data['title'] = '';

        $data['posts'] = $this->post_model->get_posts();
       
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header',$data);
        $this->load->view('posts/blogposts', $data);
        $this->load->view('templates/footer');
    }


    public function index($slug = NULL){
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comments'] = $this->comment_model->get_comments($post_id);

        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = $data['post']['title'];

        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header',$data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
        //Check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['title'] = 'Criando Post';
        $data['categories'] = $this->post_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header',$data);
        $this->load->view('posts/create', $data);
        $this->load->view('templates/footer');
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
        $data['post'] = $this->post_model->get_posts($slug);

        //check user
        if($this->session->userdata('user_id')!= $this->post_model->
        get_posts($slug)['user_id']){
            redirect('posts');

        }

        $data['categories'] = $this->post_model->get_categories();

        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = 'Editando Post';

        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header',$data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
         }
        $this->post_model->update_post();
        $this->session->set_flashdata('post_updated', 'Post atualizado com sucesso');
        redirect('posts');
    }
}
