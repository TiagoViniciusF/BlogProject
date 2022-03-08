<?php
    class users extends Controller{
        public function register(){
            $data['title'] = 'Increver-se';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 
            'matches[password]');

            if($this->form_validation->run() === FALSE){
                $data['categories'] = $this->category_model->get_categories();

                $this->load->view('templates/header',$data);
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');

            }else{
                $enc_passord = md5($this->input->post('password'));

                $this->user_model->register($enc_passord);

                $this->session->set_flashdata('user_registered', 'Você está registrado');
                redirect('posts');

            }
        }
        //login de usuario
        public function login(){
            $data['title'] = 'Entrar';

           
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
           

            if($this->form_validation->run() === FALSE){
                $data['categories'] = $this->category_model->get_categories();

                $this->load->view('templates/header',$data);
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');

            }else{

                
                $username = $this->input->post('username');

                $password = md5($this->input->post('password'));

                $user_id = $this->user_model->login($username,$password);

                if($user_id){
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true

                    );
                    $this->session->set_userdata($user_data);


                    $this->session->set_flashdata('user_loggedin',  $username.' está logado');
                    redirect('posts');

                }else{
                    $this->session->set_flashdata('login_failed', 'Usuario ou senha invalidos');
                    redirect('users/login');
                }

                $this->session->set_flashdata('user_loggedin',  $username.' está logado');
                redirect('posts');

            }

        }

        public function logout(){
            //unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('user_loggedout', 'Você está deslogado');
            redirect('users/login');
        }

        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','Nome de usuario já existe.
            Insira outro nome');
            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }

        }

        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','Já existe um usuario cadastrado
            para este email');
            if($this->user_model->check_email_exists($email)){
                return true;
            }else{
                return false;
            }

        }
    }