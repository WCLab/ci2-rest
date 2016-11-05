<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Output extends CI_Output {

	public $parse_exec_vars	= TRUE;

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file MY_Output.php */
/* Location: ./application/core/MY_Output.php */