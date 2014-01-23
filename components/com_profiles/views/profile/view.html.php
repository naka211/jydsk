<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


/**
 * HTML Contact View class for the Contact component
 *
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @since       1.5
 */
class ProfilesViewProfile extends JViewLegacy
{
	

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 */
	public function display($tpl = null)
	{ 
		
        $profileModel = JModelLegacy::getInstance('Profile', 'ProfilesModel', array('ignore_request' => true));
        $items = $profileModel->getItems();
        $this->assignRef('items', $items);
		return parent::display($tpl);
	}

	
}
