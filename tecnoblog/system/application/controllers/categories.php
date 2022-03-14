<?php

class categories extends Controller {

    public function index(){
        
        $this->load->library('parser');
       

        $data = array(
            'categories_title' => 'Categorias',
            'url' => 'http://localhost/tecnoblog/',
            'repeticao' => $this->category_model->get_categories()
            
             );
         //$this->session->userdata('logged_in') ? true:false
       
        $this->parser->parse('templates/header',$data);
        $this->parser->parse('categories/index', $data);
        $this->parser->parse('templates/footer', $data);
        
        
        

        
       // $data['categories'] = $this->category_model->get_categories();

        //$this->load->view('templates/header',$data);
        //$this->load->view('categories/index', $data);
        //$this->load->view('templates/footer');

    }

   

    public function create(){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
         }

        $this->load->library('parser');
       
        

        $this->form_validation->set_rules('name', 'Name', 'required');

       if($this->form_validation->run() === FALSE){

        $data = array(
            'url' => 'http://localhost/tecnoblog/',
            'create_categories' => 'Criando Categorias',
            'validacao' => $validacao = validation_errors(),
            //'categories' => $this->category_model->get_categories()
        );

            
        
        $this->parser->parse('templates/header',$data);
        $this->parser->parse('categories/create', $data);
        $this->parser->parse('templates/footer', $data);
      

        }else{

            $this->category_model->create_category();
            $this->session->set_flashdata('category_created', 'Categoria criada com secesso');
            redirect('posts');
        }
    }

    public function posts($id){
       $data = array(
            'url' => 'http://localhost/tecnoblog/',
            'loop_categories' => $this->category_model->get_categories(),
            'loop_posts' =>  $this->post_model->get_posts_by_category($id),
            'title' => $this->category_model->get_category($id)->name
            );
            
        $this->parser->parse('templates/header',$data);
        $this->parser->parse('posts/blogpostsCategories', $data);
        $this->parser->parse('templates/footer', $data);
    }

  

}
