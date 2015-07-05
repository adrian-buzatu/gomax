<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('Tags_model');
        }
	public function index()
	{
            
	}
        
        public function get($id = 0){            
            $result = $this->Tags_model->getRaw($id);
            $success = array(
                'success' => true,
                'data' => $result
            );
            echo json_encode($success);
        }
        
        public function up(){
            $tag_id = 0;
            $success = array(
                'success' => false
            );
            
            if($this->input->post('name') != ''){
                $record = array(
                    'name' => $this->input->post('name')
                );
                if ((int) $this->input->post('id') > 0) {
                    $tag_id = $this->input->post('id');
                    $this->Tags_model
                            ->setUpFields($record)
                            ->setUpFilters(array('id' => (int) $this->input->post('id')))
                            ->update();
                } else {
                    $tag_id = $this->Tags_model->setRecord($record)->insert();
                }
                $success = array(
                    'success' => true,
                    'data' => array_merge(array('id' => $tag_id), $record)
                );
            }
            echo json_encode($success);
        }
        
        public function delete(){
            $success = array(
                'success' => false
            );
            if ((int) $this->input->post('id') > 0) {
                $this->Tags_model
                    ->setUpFilters(array('id' => (int) $this->input->post('id')))
                    ->delete();
                $success['success'] = true;
            }
            echo json_encode($success);
        }
}
