<?php
/**
 * @module  mod_prev_login for Jommla 4.X/5.x
 *
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @copyright (c) 2023 ConseilGouz. All Rights Reserved.
 * @author ConseilGouz 
 *
 */

defined('_JEXEC') or die;
use Joomla\CMS\Helper\ModuleHelper;
use ConseilGouz\Module\PrevLogin\Site\Helper\PrevLoginHelper;

JLoader::registerNamespace('ConseilGouz\Module\PrevLogin\Site', JPATH_SITE . '/modules/mod_prev_login/src', false, false, 'psr4');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx',''));
$last            = PrevLoginHelper::getList();

require ModuleHelper::getLayoutPath('mod_prev_login', $params->get('layout', 'default'));
