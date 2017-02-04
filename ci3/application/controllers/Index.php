<?php

/**
 * angel.Index.php
 *
 * @author: aida
 * @version: 2016-12-10 21:22
 */
class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$data['base_url'] = $this->config->item( 'base_url' );;
	}

	public function index() {

		$this->smarty->view('index.tpl',$this->data);
	}

}
