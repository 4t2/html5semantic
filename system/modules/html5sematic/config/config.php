<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * PHP version 5
 * @copyright  Lingo4you 2012
 * @author     Mario Müller <http://www.lingo4u.de/>
 * @package    HTML5Semantic
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Hook
 */
$GLOBALS['TL_HOOKS']['getArticle'][] = array('GetArticleHook', 'myGetArticle');

?>