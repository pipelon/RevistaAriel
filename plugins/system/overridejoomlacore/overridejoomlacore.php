<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.sef
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Joomla! SEF Plugin.
 *
 * @since  1.5
 */
class PlgSystemOverridejoomlacore extends JPlugin
{
	/**
	 * Application object.
	 *
	 * @var    JApplicationCms
	 * @since  3.5
	 */
	protected $app;

	/**
	 * Add the canonical uri to the head.
	 *
	 * @return  void
	 *
	 * @since   3.5
	 */
	public function onAfterRoute()
	{
		$option = JFactory::getApplication()->input->get('option');
		if('com_users' == $option) {
			require_once(dirname(__FILE__) . '/registration.php');
		}
	}
}
