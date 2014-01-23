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
 * This models supports retrieving lists of contact categories.
 *
 * @package     Joomla.Site
 * @subpackage  com_contact
 * @since       1.6
 */
class ProfilesModelProfile extends JModelList
{
	public function getItems()
	{
		 // Create a new query object.
        $db		= $this->getDbo();
        $query	= $db->getQuery(true);
        // Select the required fields from the table.
        $query->select('*');
        $query->from('#__profiles');
        $query->where('state = 1');
	    $query->order('ordering');
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		return $rows;
	}
    
    function getRow()
	{
        $db		= $this->getDbo();
        $query	= $db->getQuery(true);
        $query->select('*');
        $query->from('#__profiles');
        $query->where('id = '.JRequest::getInt('id'));

		$db->setQuery($query);
		$row = $db->loadObject();
		return $row;
	}
}
