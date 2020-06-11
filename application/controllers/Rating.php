<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->library('pagination');

		$this->data['title'] = "Рейтинг фильмов";

		$offset = (int) $this->uri->segment(4);

		$row_count = 5;

		$count = count($this->films_model->getFilmsByRating(6));

		$this->load->model('films_model');
		$this->data['films'] = $this->films_model->getFilmsByRatingOnPage($row_count, $offset);

		//pagination config
		$p_config['total_rows'] = $count;
		$p_config['per_page'] = $row_count;

		$p_config['full_tag_open'] = "<ul class='pagination'>";
		$p_config['full_tag_close'] ="</ul>";
		$p_config['num_tag_open'] = '<li>';
		$p_config['num_tag_close'] = '</li>';
		$p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$p_config['next_tag_open'] = "<li>";
		$p_config['next_tagl_close'] = "</li>";
		$p_config['prev_tag_open'] = "<li>";
		$p_config['prev_tagl_close'] = "</li>";
		$p_config['first_tag_open'] = "<li>";
		$p_config['first_tagl_close'] = "</li>";
		$p_config['last_tag_open'] = "<li>";
		$p_config['last_tagl_close'] = "</li>";

		// init pagination
		$this->pagination->initialize($p_config);

		$this->data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $this->data);
		$this->load->view('rating/index', $this->data);
		$this->load->view('templates/footer', $this->data);
	}
}