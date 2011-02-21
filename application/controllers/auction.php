<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auction extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//Load Library
		$this->load->library(array('form_validation','layout'));
		
		//Load Helper
		$this->load->helper(array('breadcrumb','form'));
		
		//Load Model
		$this->load->model('auction_mdl');
		
		//Set Layout
		$this->layout->setLayout('auction/layout_main.php');
		
		/** 顶级栏目 */
       	$this->_data['parent'] = 'Auction';
		
		
    }
	
	function index()
	{
		$data['pagetitle'] = 'Auction Home';
		$this->load->library('table');
		
		$data['auction'] = $this->auction_mdl->get_activate_auction()->result();
		$this->layout->view('auction/index_main',$data);
	}
	
	function auctions()
	{
		$id = $this->uri->segment('2');
		
		$data['auction'] = $this->auction_mdl->get_auction($id)->row();
		//var_dump($a);
		
		$data['pagetitle'] =  $data['auction']->name;
		$this->layout->view('auction/auction_main',$data);
	}
	
	function do_auction()
	{
		$auction_id = $this->uri->segment('3');
		
		$user = $this->ion_auth->get_user();
		
		$auction = $this->auction_mdl->get_auction($auction_id)->row();
		
		if(time() > $auction->end_time)
		{
			$this->com_fun->show_msg('Auction is Over!','Sorry this Auction is Over!','/');			
		}
		else
		{
			$do_autcton = array(
				'auction_id' 	=> 	$auction_id,
				'user_id'		=>	$user->id,
				'user_name'		=>	$user->username,
				'price'			=>	$auction->auction_price + $auction->bid_increment,
				'create_time'	=>	time(),
				'status'		=>	'0'
			);
			
			if($this->auction_mdl->do_auction($do_autcton) == FALSE)
				{
					$this->com_fun->show_msg('Auction Fail!','Auction Fail!','-1');
				}
				else
				{
					$this->com_fun->show_msg('Auction succeed!','Auction succeed!','/auctions/'.$auction->id.'/'.$auction->short_url);
					
					$this->auction_mdl->update_auction_price($auction_id,$auction->auction_price + $auction->bid_increment);
				}
		}
		
	}
}

/* End of file Auction.php */
/* Location: ./application/Controller/Auction.php */