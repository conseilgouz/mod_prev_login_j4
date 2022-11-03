<?php
/**
 * @module  mod_prev_login for Jommla 4.X
 *
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2022 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 *
 * version 2.1.0
 */
namespace ConseilGouz\Module\PrevLogin\Site\Helper;

defined('_JEXEC') or die;
use Joomla\CMS\Factory;
/**
 * Helper for mod_prev_login
 */
class PrevLoginHelper
{
	public static function getList()
	{
		$user   = Factory::getUser();
		$userId = (int) $user->get('id');
		$db    = Factory::getDbo();
        $query = $db->getQuery(true)
			->select('profile_value')
			->from('#__user_profiles')
			->where('user_id =' . (int) $userId . ' AND profile_key LIKE \'profile_prevlogin\'');
        $db->setQuery($query);
		$last = $db->loadObject();
		return $last;
	}
}
