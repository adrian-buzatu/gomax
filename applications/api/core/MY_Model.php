<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Model
 *
 * @author shade
 */
class MY_Model extends CI_Model {
    private $_table;
    private $_record = array();
    private $_up_fields = array();
    private $_update_filter = array();
    private $_id = 0;
    private $_filter_active = array('status' => 1);
    private $_filter_inactive = array('status' => 0);
    public function __construct($model = null) {  
        if(!empty($model)){
            parent::__construct();
            $this->_table = strtolower(str_replace("_model", "", $model));            
        }        
    }
    
    public function setRecord($record){
        $this->_record = $record;
        return $this;
    }
    
    public function setId($id){
        $this->_id = $id;
        return $this;
    }
    
    public function setUpFilters($filter){
        $this->_update_filter = $filter;
        return $this;
    }
    
    public function setUpFields($fields){
        $this->_up_fields = $fields;
        return $this;
    }
    
    public function disable(){
        $this->_up_fields = array('status' => 0);
        return $this;
    }
    
    public function insert(){
        $this->db->insert($this->_table, $this->_record);
        $this->_record = array();
        return $this->db->insert_id();
    }
    
    public function update(){
        $this->db->update($this->_table, $this->_up_fields, $this->_update_filter);
        $this->_update_filter = array();
        $this->_up_fields = array();
        return $this;
    }
    
    public function delete(){
        return $this->disable()->update();
    }
    
    public function getRaw(){
        $where = $this->_filter_active;
        if((int) $this->_id > 0){
            $where = array_merge($this->_filter_active, array('id' => $this->_id));            
        }  
        $query = $this->db->get_where($this->_table, $where);
        $this->_id = 0;
        return $query->result_array();
    }
    
}
