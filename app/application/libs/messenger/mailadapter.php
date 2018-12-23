<?php

/**
 *  Mail Adater
 */
class MailAdapter{
	
	private static $mailAdapter = null;

	private function __construct() {
    }

    public static function getMailAdapter(){
    	if(self::$mailAdapter == null){
    		self::$mailAdapter = new MailAdapter();
    	}
    	return self::$mailAdapter;
    }

   	public function sendMail($from, $subject, $message, $to){

   		include_once APP . "libs/swift/swift_required.php";

        //$subject 	= 	'Hello from Mandrill, PHP!';
        //$from 	= 		array('no-reply@hoaxed.me' =>'Hoaxed.Me');
        //$to 		= 		array('sheehabxyz@gmail.com'  => 'Muhammad Sheehab');

        
        $messagebody = '
            <body itemscope itemtype="http://schema.org/EmailMessage" style="color: #666; font-size: 14px; line-height: 18px; font-family: Verdana,sans; margin-top: 0px; background: #FAFAFA;">
                <div style="max-width: 75%; width: 600px; margin: 0px auto; padding: 5%;">
                    <h2 style="text-align: center; color: #40D074; font-size: 35px;">Hoaxed.Me</h2>
                    <div style="padding: 35px; border: 1px solid #E4E4E4; border-radius: 5px; background: #fff;">
                        <p>
                            '.$message.'
                        </p>
                    </div>
                </div>
            </body>';

        $html = $messagebody;

        $transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
        $transport->setUsername('Ezares');
        $transport->setPassword('2Tvo3RIn9IIIfu7vU8OZCg');
        $swift = Swift_Mailer::newInstance($transport);

        $message = new Swift_Message($subject);
        $message->setFrom($from);
        $message->setBody($html, 'text/html');
        $message->setTo($to);

        if ($recipients = $swift->send($message, $failures)){
            return true;
        } else {
            $this->msg = 'Could not Send the Message!';
            return false;
        }
   	}

}

?>