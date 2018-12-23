<?php 

include_once APP . "libs/messenger/email.php";

/**
 * Notifier Class
 */

class Notifier{
	private $messenger;

	function __construct($messenger) {
        $this->messenger = $messenger;
    }

	public function notify($subject, $message, $to){
		if($this->messenger->send($subject, $message, $to)){
			return true;
		} else {
			return false;
		}

	}
}