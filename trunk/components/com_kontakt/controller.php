<?php

jimport('joomla.application.component.controller');

class KontaktController extends JControllerLegacy {
    function frontpage_submit(){
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$db			= & JFactory::getDBO();
		
		$name		= JRequest::getVar( 'name',			'',			'post' );
		$email		= JRequest::getVar( 'email',			'',			'post' );
		$telefon	= JRequest::getVar( 'telefon',			'',			'post' );
		$text		= JRequest::getVar( 'text',			'',			'post' );
		
		$subject	= 'Jydsk Lasercenter Measurement - Besked fra kontakt-formularen';
		$message	= "Hej Admin!\n\r\n\rDer er en forespørgsel fra kontakt-formularen fra jydsklasercenter.dk\nNavn: $name\nTelefon: $telefon\nEmail: $email\nBesked: $text\n\r\n\rMed venlig hilsen,\nJydsk Lasercenter";
		
		jimport('joomla.mail.helper');
		$mail = JFactory::getMailer();
		$config =& JFactory::getConfig();
		$mail->addRecipient( $config->getValue('config.mailfrom') );
		$mail->setSender( array( $email, $name ) );
		$mail->setSubject( $subject );
		$mail->setBody( $message );
		$sent = $mail->Send();
        
        
        //LDC Send relay
        $subject = 'Jydsk Lasercenter Measurement - Besked fra kontakt-formularen';
		$body1 = "Tak for din henvendelse.<br /><br />";
		$body1 .= "Du vil modtage svar indenfor 2 arbejdsdage, hvis det er praktisk muligt.<br /><br />";
        $body1 .= "Med venlig hilsen<br />";
        $body1 .= "Jydsk Lasercenter<br />";
        $body1 .= "Hudklinikken i Thisted<br />";
        $body1 .= "Havnetorv 1 B, 1. sal<br />";
        $body1 .= "7700 Thisted<br />";
        $body1 .= "Tlf.: 97926700<br />";
        $body1 .= "E-mail: laser@jydsklasercenter.dk<br />";
        $body1 .= "www.jydsklasercenter.dk<br />";
        $body1 .= "www.hudlaegenscremeshop.dk<br />";
        $body1 .= '<a href="http://www.facebook.com/pages/Jydsk-Lasercenter/203270099703773"><img src="http://jydsklasercenter.dk/images/face.png" /></a>';
        
		$mail1 =& JFactory::getMailer();
        $mail1->isHTML(true);
        $mail1->Encoding = 'base64';
		$mail1->addRecipient($email);
		$mail1->setSender( array( 'noreply@jydsklasercenter.dk', 'System No-reply' ) );
		$mail1->setSubject( $subject );
		$mail1->setBody( $body1 );
		$sent = $mail1->Send();

		$msg = JText::_( 'Tak for din henvendelse! Vi vil kontakte dig hurtigst muligt' );

		global $mainframe, $option;
		$mainframe->setUserState( $option.'msg', $msg  );

		$link = JRoute::_('index.php?option=com_kontakt&view=index&layout=response');
		$this->setRedirect($link, $msg);
	}
	
	function submit()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$post	= JRequest::get('post');
		
		$name		= JRequest::getVar( 'name',			'',			'post' );
		$email		= JRequest::getVar( 'email',		'',			'post' );
		$company	= JRequest::getVar( 'company',		'',			'post' );
		$subject_2	= JRequest::getVar( 'subject',		'',			'post' );
		$text		= JRequest::getVar( 'text',			'',			'post' );
		
		$subject	= 'Jydsk Lasercenter Measurement - Besked fra kontakt-formularen';
		$body = "Hej Admin!\n\r\n\rDer er en forespørgsel fra kontakt-formularen fra jydsklasercenter.dk\nNavn: $name\nFirma: $company\nEmail: $email\nEmne: $subject_2\nBesked: $text\n\r\n\rMed venlig hilsen,\nJydsk Lasercenter";
		
		jimport('joomla.mail.helper');
		$mail =& JFactory::getMailer();
		
		$config =& JFactory::getConfig();
		
		$mail->addRecipient( $config->getValue('config.mailfrom') );
		$mail->setSender( array( $email, $name ) );
		$mail->setSubject( $subject );
		$mail->setBody( $body );
		$sent = $mail->Send();
        
        
        //LDC Send relay
        $subject = 'Jydsk Lasercenter Measurement - Besked fra kontakt-formularen';
		$body1 = "Tak for din henvendelse.<br /><br />";
		$body1 .= "Du vil modtage svar indenfor 2 arbejdsdage, hvis det er praktisk muligt.<br /><br />";
        $body1 .= "Med venlig hilsen<br />";
        $body1 .= "Jydsk Lasercenter<br />";
        $body1 .= "Hudklinikken i Thisted<br />";
        $body1 .= "Havnetorv 1 B, 1. sal<br />";
        $body1 .= "7700 Thisted<br />";
        $body1 .= "Tlf.: 97926700<br />";
        $body1 .= "E-mail: laser@jydsklasercenter.dk<br />";
        $body1 .= "www.jydsklasercenter.dk<br />";
        $body1 .= "www.hudlaegenscremeshop.dk<br />";
        $body1 .= '<a href="http://www.facebook.com/pages/Jydsk-Lasercenter/203270099703773"><img src="http://jydsklasercenter.dk/images/face.png" /></a>';
        
		$mail1 =& JFactory::getMailer();
        $mail1->isHTML(true);
        $mail1->Encoding = 'base64';
		$mail1->addRecipient($email);
		$mail1->setSender( array( 'noreply@jydsklasercenter.dk', 'System No-reply' ) );
		$mail1->setSubject( $subject );
		$mail1->setBody( $body1 );
		$sent = $mail1->Send();
        
		
		// message
		$msg = JText::_( 'Tak for din henvendelse! Vi vil kontakte dig hurtigst muligt' );

		global $mainframe, $option;
		$mainframe->setUserState( $option.'msg', $msg  );

		$link = JRoute::_('index.php?option=com_kontakt&view=index&layout=response');
		$this->setRedirect($link, $msg);
	}

	
	function subscriber()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$email = $_POST['subscriber'];
		
		$db = &JFactory::getDBO();
		
		$sql = "SELECT * FROM #__acajoom_subscribers WHERE `email`='".$email."';";
		$db->setQuery($sql);
		if (!$db->loadResult())
		{						
			$date =& JFactory::getDate();
			$name = $email;
			$list_id = 1;
			$user =& JFactory::getUser();
			$user_id = $user->get('id');
			
			$sql = "INSERT INTO `#__acajoom_subscribers`(`id`,`user_id`,`name`,`email`,`receive_html`,`confirmed`,`blacklist`,`timezone`,`language_iso`,`subscribe_date`,`params`) VALUES ( NULL,'".$user_id."','".$name."','".$email."','1','0','0','00:00:00','eng','".$date->toMySQL()."',NULL);";
			$db->Execute($sql);
			
			$id = $db->insertid();
			$sql = "INSERT INTO `#__acajoom_queue`(`qid`,`type`,`subscriber_id`,`list_id`,`mailing_id`,`issue_nb`,`send_date`,`suspend`,`delay`,`acc_level`,`published`,`params`) VALUES ( NULL,'1','".$id."','".$list_id."','0','0','0000-00-00 00:00:00','0','0','29','0',NULL);
";
			$db->Execute($sql);
		}

		// message
		$msg = JText::_( 'Tak for tilmedling vores nyhedsbrev!' );

		global $mainframe, $option;
		$mainframe->setUserState( $option.'msg', $msg  );
		
		$link = JRoute::_('index.php?option=com_kontakt&view=index&layout=response');
		$this->setRedirect($link);
	}
	
	function unsubscriber()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$email = $_POST['subscriber'];
		$db = &JFactory::getDBO();
		
		$sql = "SELECT id FROM #__acajoom_subscribers WHERE `email`='".$email."';";
		$db->setQuery($sql);
		$id = $db->loadResult();

		$sql = "DELETE FROM `#__acajoom_subscribers` WHERE `email`='".$email."';";			
		$db->Execute($sql);
		
		$sql = "DELETE FROM `#__acajoom_queue` WHERE `subscriber_id`='".$id."';";			
		$db->Execute($sql);
		
		// message
		$msg = JText::_( 'Tak for afmelding vore nyhedsbrev!' );

		global $mainframe, $option;
		$mainframe->setUserState( $option.'msg', $msg  );
		
		$link = JRoute::_('index.php?option=com_kontakt&view=index&layout=response');
		$this->setRedirect($link);
	}	
}
?> 