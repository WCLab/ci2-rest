<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Input extends CI_Input {

	var $_input_stream;
	var $_raw_input_stream;
	var $raw_input_stream;

	public function __construct()
	{
		parent::__construct();
		$this->_raw_input_stream = file_get_contents('php://input');
	}

	public function method($upper = FALSE)
	{
		return ($upper)
			? strtoupper($this->server('REQUEST_METHOD'))
			: strtolower($this->server('REQUEST_METHOD'));
	}

	// public function get($index = NULL, $xss_clean = NULL)
	// {
	// 	return $this->_fetch_from_array($_GET, $index, $xss_clean);
	// }

	public function input_stream($index = NULL, $xss_clean = NULL)
	{
		// Prior to PHP 5.6, the input stream can only be read once,
		// so we'll need to check if we have already done that first.
		if ( ! is_array($this->_input_stream))
		{
			// $this->raw_input_stream will trigger __get().
			parse_str($this->raw_input_stream, $this->_input_stream);
			is_array($this->_input_stream) OR $this->_input_stream = array();
		}

		return $this->_fetch_from_array($this->_input_stream, $index, $xss_clean);
	}

}

/* End of file MY_Input.php */
/* Location: ./application/core/MY_Input.php */