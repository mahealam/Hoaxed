<?php
require 'imessenger.php';
include_once APP . "libs/messenger/mailadapter.php";

class Email implements iMessenger{

	private $from = array('no-reply@hoaxed.me' => 'Hoaxed.Me'); 
	
	function __construct(){
    }

	// function __construct($from) {
 	//}

    public function send($subject, $message, $to){
    	$mailadapter = MailAdapter::getMailAdapter();
    	if( $mailadapter->sendMail($this->from, $subject, $message, $to)){
    		return true;
    	} else {
    		return false;
    	}
    }
}

?>