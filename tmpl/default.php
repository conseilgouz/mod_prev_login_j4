<?php
/**
 * @module  mod_prev_login version 2.0.1 pour Joomla 4.0
 *
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2021 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 *
 */

defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
?>
<?php if (!empty($last)) {
	$val = date('d/m/Y H:i:s');
	if (($last) && isset($last->profile_value) && ($last->profile_value != '0000-00-00 00:00:00')) {
		$val = $last->profile_value;
	}
	?>
	<p class="prevlogin-module<?php echo $moduleclass_sfx; ?>">
		Derni&egrave;re connexion : <?php echo $val; ?>
	</p>
<?php } ?>
