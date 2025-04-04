<?php
class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
    }

    public function index() {
        $data['categories'] = $this->Category_model->get_all();
        $this->load->view('category_view', $data);
    }

    public function add() {
        if ($this->input->post('name')) {
            $this->Category_model->add($this->input->post('name'));
            redirect('category');
        }
    }
}
