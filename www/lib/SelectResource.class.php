<?php
/**
*   
* Selectresource class
* Allow searching and selection of a resource
* Perform user specified function when selected
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 07-08-06
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
/**
* Base directory of application
*/
@define('BASE_DIR', dirname(__FILE__) . '/..');
/**
* Include AdminDB class
*/
include_once('db/AdminDB.class.php');


/**
* Include Selectresource template files
*/
include_once(BASE_DIR . '/templates/selectresource.template.php');

class SelectResource {
	var $db;
	var $name;
	var $pager;
	var $resources;
	var $javascript = '';
	var $toresid = ''; // jaro optimist
	var $uitleennivo = ''; // jaro optimist
	var $available = true; // jaro optimist
	/**
	* Sets up initial variable values
	*/
	function SelectResource($name = '') {
		
		$orders = array('name', 'notes', 'machid','status'); 
		$this->db = new AdminDB();
		$this->pager = new Pager(0, 10);
		$this->pager->setViewLimitSelect(false);
		

			$num = $this->db->get_num_admin_recs('resources');	// Get number of records
			$this->pager->setTotRecords($num);					
			$this->resources = $this->db->get_all_admin_data($this->pager, 'resources', $orders, true);
			// $this->toresid = $resid;
			//echo ('toresid'. $this->toresid);
	}
	
	function printResourceTable() {
		print_resource_list($this->pager, $this->resources, $this->db->get_err(), $this->javascript, $this->toresid, $this->available, $this->uitleennivo); // add $this->available
		$this->pager->text_style = 'font-size:11px;';
		$this->pager->printPages();
	}
}
?>