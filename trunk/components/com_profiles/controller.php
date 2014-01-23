<?php
/**
 * @version     1.0.0
 * @package     com_profiles
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Nguyen Thanh Trung <nttrung211@yahoo.com> - http://
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class ProfilesController extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = false){ 
		parent::display();
	}
    
    function submit(){
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$post	= JRequest::get('post');
		
		// message
		$msg = JText::_( 'Submit' );
		
		$db			= & JFactory::getDBO();
		
		$id = JRequest::getInt('id');
		
        $db = JFactory::getDBO();
        $db->setQuery("SELECT * FROM #__profiles WHERE id = ".$id);
        $profile = $db->loadObject();
		
		$name		= JRequest::getVar( 'name',			'',			'post' );
		$email		= JRequest::getVar( 'email',			'',			'post' );
		$telefon		= JRequest::getVar( 'telefon',			'',			'post' );
		$city		= JRequest::getVar( 'by',			'',			'post' );
		$subject		= JRequest::getVar( 'subject',			'Jydsk Lasercenter New Contact Email',			'post' );
		$body		= JRequest::getVar( 'text',			'',			'post' );
		$message = "Dear ".$profile->full_name.",\n\r\n\rYou have a new contact email\n\r\n\rCity: $city\nTelefon: $telefon\nMessage:\n$body\n\r\n\rBest Regards,\n\rWebsite Team";
		
		jimport('joomla.mail.helper');
		$mail = JFactory::getMailer();

		$mail->addRecipient( $profile->email );
		$mail->setSender( array( $email, $name ) );
		$mail->setSubject( $subject );
		$mail->setBody( $body );

		$sent = $mail->Send();	
		
		echo "<script>window.close();</script>";
	}
}