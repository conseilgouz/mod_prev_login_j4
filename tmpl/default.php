<?php
/**
 * @module  mod_prev_login pour Joomla 4.X
 *
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2022 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 *
 */

defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;

$user = Factory::getUser();
$perso = "";
$first = false;
$current = date('d/m/Y H:i:s');
$val = $last->profile_value;
$date1=strtotime($current);
$date2=strtotime($val);
$interval  = abs($date1 - $date2);
$minutes   = round($interval / 60);
if ($minutes == 0) { // last = current => suppose 1st login
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
