<?php
/**
 * @module  mod_prev_login pour Joomla 4.X/5.x
 *
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2023 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 *
 */

defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;

$user = Factory::getUser();
if ($user->guest) { // only registred user allowed
	return false;
}
$perso = "";
$first = false;
$val = $last->profile_value;
if (!$val) { // last->profile_value empty => 1st login
	$first = true;
}
if (!$first) { // standard message
	$perso = $params->get('perso','{def} {date}');
	$arr_css= array("{def}"=>Text::_('MOD_PREV_LOGIN_DEF'),"{date}"=>$val,"{name}"=>$user->name); 
	foreach ($arr_css as $key_c => $val_c) {
		$perso = str_replace($key_c, Text::_($val_c),$perso);
	}
}
if (($params->get('empty','false') == 'true') && $first) { // 1st login message ?
	$perso = $params->get('persoempty','{def1}');
	$arr_css= array("{def}"=>Text::_('MOD_PREV_LOGIN_DEF1'),"{name}"=>$user->name); 
	foreach ($arr_css as $key_c => $val_c) {
			$perso = str_replace($key_c, Text::_($val_c),$perso);
	}
}
if ($perso) { // on a une information à afficher
	echo '<p class="prevlogin-module '.$moduleclass_sfx.'">';
    echo $perso; 
	echo '</p>';
}
?>
