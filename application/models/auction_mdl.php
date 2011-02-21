<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auction_mdl extends CI_Model {
	
	const TBL_AUCTION = 'auctions';
	const TBL_DO_AUCTION = 'do_auction';
	
	/**
     * 构造函数
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
       parent::__construct();       
    }
    
	
	/**
	 * get_activate_auction
	 *
     * @access public
	 * @param 
	 * @return array
	 */
	function get_activate_auction()
	{
		return $this->db->get(self::TBL_AUCTION);
	}
	
	function get_auction($id)
	{	
		$this->db->where('id',$id);
		return $this->db->get(self::TBL_AUCTION);
	}
	
	function do_auction($do_auction)
	{
		$this->db->insert(self::TBL_DO_AUCTION,$do_auction);
		return ($this->db->affected_rows()==1) ? $this->db->insert_id() : FALSE;
	}
	
	function update_auction_price($auction_id,$price)
	{
		$this->db->update(self::TBL_AUCTION,array('auction_price' => $price),"id = $auction_id");
	}
	
	
}

/* End of file Auction.php */
/* Location: ./application/models/Auction_mdl.php */