<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * PHP version 5
 * @copyright  Lingo4you 2012
 * @author     Mario Müller <http://www.lingo4u.de/>
 * @package    HTML5Semantic
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */
 
class GetArticleHook extends Frontend {

	public function myGetArticle($objRow)
	{
		global $objPage;

		/* check only in main column and on HTML5 pages */
		if (($objRow->inColumn != 'main') || ($objPage->outputFormat == 'xhtml'))
		{
			return;
		}

		$this->import('Database');

		$time = time();

		/* Show all articles of the  column main */
		$objArticles = $this->Database->prepare("SELECT id, h5s_start_article AS start_article FROM tl_article WHERE pid=? AND inColumn=?" . (!BE_USER_LOGGED_IN ? " AND (start='' OR start<$time) AND (stop='' OR stop>$time) AND published=1" : "") . " ORDER BY sorting")
									  ->execute($objPage->id, 'main');

		$start_article = false;
		$article_pos = 0;
		$article_count = 0;

		while ($objArticles->next())
		{
			$article_count++;

			/* if article is current article */
			if ($objArticles->id == $objRow->id)
			{
				$article_pos = $article_count;

				if ($objArticles->start_article && $start_article)
				{
					$objRow->close_article_top = true;
				}

				if ($objArticles->start_article)
				{
					$objRow->start_article = true;
				}
			}

			if ($objArticles->start_article)
			{
				$start_article = true;
			}
		}

		if ($article_pos == $article_count && $start_article)
		{
			$objRow->close_article_bottom = true;
		}
	}

}
?>