<?php
    class comments extends Controller{

        public function create($post_id){
            $slug = $this->input->post('slug');
            $data['post'] = $this->post_model->get_posts($slug);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                $data['categories'] = $this->category_model->get_categories();

                $this->load->view('templates/header',$data);
                $this->load->view('posts/index', $data);
                $this->load->view('templates/footer');
                } else {
                $this->comment_model->create_comment($post_id);
                redirect('posts/'.$slug);
                }
        }


    }