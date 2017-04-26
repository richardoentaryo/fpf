<?php
class Welcome extends Controller
{
	public function __construct()
	{
		parent::__construct();
		//add your own contructor below...
	}

	public function index()
	{
		$this->view->forge("welcome_page");
	}
}
