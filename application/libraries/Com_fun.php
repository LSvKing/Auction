<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Com_fun
{
	var $CI;
	
	function __construct()
	{
		$this->ci = get_instance();
	}
	
	function show_msg($heading,$msg,$url)
	{
		$data['heading'] = $heading;
		$data['msg'] 	 = $msg;
		$data['url'] 	 = $url;
		$this->ci->load->view('msgbox/msg.php',$data);
	}
}

?>