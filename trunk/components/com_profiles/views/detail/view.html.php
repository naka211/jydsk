<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Medarbejdere Component
 *
 * @package    Medarbejdere
 */
class ProfilesViewDetail extends JViewLegacy
{
    public function display($tpl = null)
	{ 
        $uri = JFactory::getURI();
        $profileModel = JModelLegacy::getInstance('Profile', 'ProfilesModel', array('ignore_request' => true));
        $row = $profileModel->getRow();
        $this->assignRef('row', $row);
        $this->assign('template_dir', JURI::root().'templates/jyd/');
        $this->assign('action', $uri->toString());
		return parent::display($tpl);
	}
}
?> 