<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$controller	= JControllerLegacy::getInstance('Kontakt');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
?>