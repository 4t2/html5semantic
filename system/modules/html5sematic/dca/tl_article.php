<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
* PHP version 5
* @copyright  Lingo4you 2012
* @author     Mario Müller <http://www.lingo4u.de/>
* @package    HTML5Semantic
* @license    http://opensource.org/licenses/lgpl-3.0.html
 */

$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace(';{publish_legend}', ',h5s_start_article;{publish_legend}', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);

/**
 * Table tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['h5s_start_article'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_article']['h5s_start_article'],
	'exclude'                 => true,
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50')
);

?>