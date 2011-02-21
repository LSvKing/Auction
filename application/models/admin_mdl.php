<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 *  Auction System
 *
 * 
 *
 * @package		Auction
 * @author		LSvKing <LSvKing@gmail.com>
 * @copyright	Copyright (c) 2010 - 2011, LSvKing.com.
 * @license		GNU General Public License 2.0
 * @link		
 * @version		0.1.0
 */
 
// ------------------------------------------------------------------------

/**
 * Admin Models Class
 *
 * Admin Models
 *
 * @package		LSvKing
 * @subpackage	Auction Models
 * @category	Models
 * @author		LSvKing <LSvKing@gmail.com>
 * @link		
 */
class Admin_mdl extends CI_Model {
	
	const TBL_AUCTION = 'auctions';
	
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
	 * Create_auction
     * @access public
	 * @param array $auction
	 * @return void
	 */
	function create_auction($auction)
	{
		$this->db->insert(self::TBL_AUCTION,$auction);
		return ($this->db->affected_rows()==1) ? $this->db->insert_id() : FALSE;
	}
	
	function auction_show($id)
	{
		$this->db->insert(self::TBL_AUCTION,$auction);
	}
}

/* End of file Admin_mdl.php */
/* Location: ./application/models/Admin_mdl.php */