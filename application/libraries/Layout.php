<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    
    var $CI;
    var $layout;
    
    function __construct($layout = "layout_main")
    {
        $this->CI = get_instance();
        $this->layout = $layout;
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }
    
    function view($view, $data=null, $return=false)
    {
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->CI->load->view($view,$data,true);
        
        if($return)
        {
            $output = $this->CI->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->CI->load->view($this->layout, $loadedData, false);
        }
    }
}
?> 