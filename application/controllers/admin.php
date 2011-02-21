<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Auction System
 *
 * 拍卖系统系统
 *
 *
 * @package		Auction
 * @author		LSvKing <LSvKing@Gmail.com>
 * @copyright           Copyright (c) 2010 - 2011, cnerent.com.
 * @link		
 * @version		0.1.0
 */

// ------------------------------------------------------------------------

/**
 * Auction 后台控制器
 *
 *	后台
 *
 * @package		Auction
 * @subpackage	Controllers
 * @category	Front-controllers
 * @author		LSvKing <LSvKing@Gmail.com>
 * @link		
 */

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//Load Library
		$this->load->library(array('form_validation','layout'));
		
		//Load Helper
		$this->load->helper(array('breadcrumb','form'));
		
		//Set Layout
		$this->layout->setLayout('admin/index');
		
		/** 顶级栏目 */
       	$this->_data['parent'] = 'Auction';
		
		//check_uri_permissions
		if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('auth/login');
		}
    }

	
	function index()
	{
		echo 'Admin Home!';
		//var_dump();
		//$this->layout->view('admin/create_auction',$this->_data);
	}
	
	
	//添加新拍卖
	function create_auction()
	{
		/** 二级栏目 */
        $this->_data['current'] = 'Create Auction';
        $this->_data['pagetitle'] = 'Create Auction';
		
		$this->load->model('Admin_mdl');
		
		$rules = array(
			array(
                    'field'   => 'name', 
                    'label'   => 'Auction_Name', 
                    'rules'   => 'required|trim'
            ),
			array(
                    'field'   => 'short_url', 
                    'label'   => 'short_url', 
                    'rules'   => 'alpha_dash|trim'
            ),
			array(
					'field'		=>	'retail_price',
					'label'		=>	'Retail_price',
					'rules'		=>	'required'
					
			),
			array(
					'field'		=>	'auction_price',
					'label'		=>	'Auction_price',
					'rules'		=>	''			
			),
			array(
					'field'		=>	'bid_increment',
					'label'		=>	'Bid_increment',
					'rules'		=>	''			
			),
			array(
					'field'		=>	'create_time',
					'label'		=>	'Create_time',
					'rules'		=>	''			
			),
			array(
					'field'		=>	'end_time',
					'label'		=>	'End_time',
					'rules'		=>	'required'			
			),
			array(
					'field'		=>	'description',
					'label'		=>	'Description',
					'rules'		=>	'required'			
			),
			array(
					'field'		=>	'pic',
					'label'		=>	'Picture',
					'rules'		=>	'required'			
			),
			array(
					'field'		=>	'thumb',
					'label'		=>	'Thumbnail',
					'rules'		=>	'required'			
			)			  
		);
		
		$this->form_validation->set_rules($rules);
		
		if(isset($_POST['submit']))
		{	

			if($this->form_validation->run()){
			
				if($this->input->post('short_url'))
				{
					$short_url = $this->input->post('short_url',TRUE);
				}else{
					$short_url = url_title(set_value('name'),'dash',TRUE);
				};
				
				$auction = array(
					'name'			=>	$this->input->post('name',TRUE),
					'short_url'		=> 	$short_url,
					'retail_price'	=>	$this->input->post('retail_price',TRUE),
					'auction_price'	=>	$this->input->post('auction_price',TRUE),
					'bid_increment'	=>	$this->input->post('bid_increment',TRUE),
					'create_time'	=>	strtotime($this->input->post('create_time',TRUE).'00:00:00'),
					'end_time'		=>	strtotime($this->input->post('end_time',TRUE).'23:59:59'),
					'description'	=>	$this->input->post('description',TRUE),
					'thumb'			=>	$this->input->post('thumb',TRUE),
					'pic'			=>	serialize($this->input->post('pic'))
				);
				
				//var_dump($auction);
				if($this->Admin_mdl->create_auction($auction) == FALSE)
				{
					$this->com_fun->show_msg('Database errors','Database errors','-1');
				}
				else
				{
					$this->com_fun->show_msg('Create Auction Succeed! ','Create Auction Succeed!','/admin/create_auction');
				}	
														
			}else{
				echo validation_errors();
			}	

		}
		else
		{
			$this->layout->view('admin/create_auction',$this->_data);
		}
			
	}

	
	function up()
	{
		$this->load->helper('form');
		$this->load->view('up');
	}
	
	function uploadify()
	{
		if (!empty($_FILES)) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
		
		
		$filetype = explode('.',$_FILES['Filedata']['name']);
		
		$filename = time().rand(01,99).'.';
		
		$targetFile =  str_replace('//','/',$targetPath).$filename.$filetype['1'];
		
		//$fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
		//$fileTypes  = str_replace(';','|',$fileTypes);
		// $typesArray = split('\|',$fileTypes);
		// $fileParts  = pathinfo($_FILES['Filedata']['name']);
		
		// if (in_array($fileParts['extension'],$typesArray)) {
			// Uncomment the following line if you want to make the directory if it doesn't exist
			// mkdir(str_replace('//','/',$targetPath), 0755, true);
			
			move_uploaded_file($tempFile,$targetFile);
			$b = str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
			//$file_path = str_replace('.'.$filetype['1'],'',$b);
			echo $b;
			
		// } else {
		// 	echo 'Invalid file type.';
		// }
		}
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $targetFile;
		//$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 290;
		$config['height'] = 260;	
		
		$this->load->library('image_lib', $config); 

		$this->image_lib->resize();
	}
	
	function thumb_up()
	{
		if (!empty($_FILES)) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
		
		
		$filetype = explode('.',$_FILES['Filedata']['name']);
		
		$filename = time().rand(01,99).'.';
		
		$targetFile =  str_replace('//','/',$targetPath).$filename.$filetype['1'];
		
			move_uploaded_file($tempFile,$targetFile);
			$b = str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
			//$file_path = str_replace('.'.$filetype['1'],'',$b);
			echo $b;
			
		// } else {
		// 	echo 'Invalid file type.';
		// }
		}
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $targetFile;
		//$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 125;	
		
		$this->load->library('image_lib', $config); 

		$this->image_lib->resize();
	}
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */