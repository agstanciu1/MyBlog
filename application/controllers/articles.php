<?php 
	class Articles extends CI_Controller{
		public function index($offset = 0){
			//Pagination Config
			$config['base_url'] = base_url() . 'articles/index/';
			$config['total_rows'] = $this->db->count_all('articles');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['attributes'] = array('class' => 'pagination-links');
			

			// Start Pagination
			$this->pagination->initialize($config);


			$data['title'] = 'Latest Articles';

			$data['articles'] = $this->article_model->get_articles(FALSE, $config['per_page'], $offset);
			$data['categories'] = $this->article_model->get_categories();


			$this->load->view('templates/header');
			$this->load->view('articles/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['article'] = $this->article_model->get_articles($slug);
			$article_id = $data['article']['id'];
			$data['comments'] = $this->comment_model->get_comments($article_id);	

			if(empty($data['article'])){
				show_404();
			}
			$data['title'] = $data['article']['title'];

			$this->load->view('templates/header');
			$this->load->view('articles/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Create Article';
			$data['categories'] = $this->article_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){

			$this->load->view('templates/header');
			$this->load->view('articles/create', $data);
			$this->load->view('templates/footer');
			} else {
				//Upload Image
				$config['upload_path'] = './assets/images/articles';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '300';
				$config['max_height'] = '300';

				$this->load->library('upload', $config);

				If(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$article_image = 'noimage.jpg';

				}else {
					$data = array('upload_data' => $this->upload->data());
					$article_image = $_FILES['userfile']['name'];
				};

				$this->article_model->create_article($article_image);

				$this->session->set_flashdata('article_created', 'Your article has been created');
				redirect('articles');
			}

		}

		public function delete($id){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->article_model->delete_article($id);
			$this->session->set_flashdata('article_deleted', 'Your article has been deleted');

			redirect('articles');
		}

		public function edit($slug){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['article'] = $this->article_model->get_articles($slug);
			if($this->session->userdata('user_id') != $this->article_model->get_articles($slug)['user_id']){
				redirect('articles');
			}

			$data['categories'] = $this->article_model->get_categories();

			if(empty($data['article'])){
				show_404();
			}
			$data['title'] = 'Edit Article';

			$this->load->view('templates/header');
			$this->load->view('articles/edit', $data);
			$this->load->view('templates/footer');

		}

		public function update(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->article_model->update_article();

			$this->session->set_flashdata('article_updated', 'Your article has been updated');
			redirect('articles');
		}

		
	}

