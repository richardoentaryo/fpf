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

	public function usermanual($guidePage = null, $menuChanged = null)
	{
		if ($menuChanged != null)				 $this->redirect("welcome/usermanual/" . $menuChanged);

		if ($guidePage == null) 			 $this->view->forgeWithLayouts("header_usermanual", "userManual/userManual", "footer_usermanual");
		else if ($guidePage == "cli") 		 $this->view->forgeWithLayouts("header_usermanual", "userManual/CLI_manual", "footer_usermanual");
		else if ($guidePage == "controller") $this->view->forgeWithLayouts("header_usermanual", "userManual/controller_manual", "footer_usermanual");
		else if ($guidePage == "model") 	 $this->view->forgeWithLayouts("header_usermanual", "userManual/model_manual", "footer_usermanual");
		else if ($guidePage == "view") 		 $this->view->forgeWithLayouts("header_usermanual", "userManual/view_manual", "footer_usermanual");
		else if ($guidePage == "config") 	 $this->view->forgeWithLayouts("header_usermanual", "userManual/config_manual", "footer_usermanual");
		else if ($guidePage == "session") 	 $this->view->forgeWithLayouts("header_usermanual", "userManual/session_manual", "footer_usermanual");
		else if ($guidePage == "cookie") 	 $this->view->forgeWithLayouts("header_usermanual", "userManual/cookies_manual", "footer_usermanual");
		else if ($guidePage == "validation") $this->view->forgeWithLayouts("header_usermanual", "userManual/validation_manual", "footer_usermanual");
		else if ($guidePage == "encryption") $this->view->forgeWithLayouts("header_usermanual", "userManual/encryption_manual", "footer_usermanual");
		else if ($guidePage == "upload") 	 $this->view->forgeWithLayouts("header_usermanual", "userManual/upload_manual", "footer_usermanual");
		else if ($guidePage == "helpers") 	 $this->view->forgeWithLayouts("header_usermanual", "userManual/helper_manual", "footer_usermanual");
	}
}
