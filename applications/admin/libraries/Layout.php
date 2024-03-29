<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout {

    var $obj;
    var $layout;

    function __construct()
    {
        $this->obj =& get_instance();
        $this->layout = 'main';
    }

    function set($layout)
    {
      $this->layout = $layout;
      return $this;
    }

    function view($view, $data=null, $return=false)
    {
        $loadedData = array();
        $loadedData['content'] = $this->obj->load->view($view,$data,true);

        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }

    /*public function table($tableConfig, $view = 'templates/table.php'){
        $output = $this->obj->load->view($view, $tableConfig, true);
        return $output;
    }*/
}
