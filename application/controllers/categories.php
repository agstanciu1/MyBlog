<?php 
	class Categories extends CI_Controller{


		public function create_category(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$data['title'] = 'Create Category';
			$data['categories'] = $this->article_model->get_categories();

			$this->form_validation->set_rules('category_name', 'Category', 'required');
			
			if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/footer');
			} else {
				
				$this->article_model->create_category();

				$this->session->set_flashdata('category_created', 'Your category has been created');
				redirect('categories');
			}

		}

		public function delete($id){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->category_model->delete_category($id);
			$this->session->set_flashdata('category_deleted', 'Your Category has been deleted');

			redirect('categories');
		}

		public function index_categories(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$data['title'] = 'Categories';

			$data['categories'] = $this->category_model->get_categories();


			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function view_categories($id = NULL){
			$data['article'] = $this->category_model->get_categories($name);

			if(empty($data['article'])){
				show_404();
			}
			$data['title'] = $data['article']['title'];

			$this->load->view('templates/header');
			$this->load->view('articles/view', $data);
			$this->load->view('templates/footer');
		}

		public function articles($id){
			$data['title'] =  $this->category_model->get_category($id)->name;
			$data['articles'] = $this->category_model->get_articles($id);
			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header');
			$this->load->view('categories/articles', $data);
			$this->load->view('templates/footer');
		}


	}
	