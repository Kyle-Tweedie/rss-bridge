<?php

class PlaywonderlandsNewsBridge extends XPathAbstract {

	const NAME = 'Tiny Tinas Wonderlands News';
	const URI = 'https://playwonderlands.2k.com/news/';
	const DESCRIPTION = 'Tiny Tinas Wonderlands newsfeed';
	const MAINTAINER = 'Kyle-Tweedie';
	const PARAMETERS = array(
		'' => array(
			'locale' => array(
				'name' => 'Language',
				'type' => 'list',
				'values' => array(
					'English (US)' => 'en-us',
				),
				'defaultValue' => 'en-us',
				'title' => 'Select your language'
			)
		)
	);
	const CACHE_TIMEOUT = 3600;

	const XPATH_EXPRESSION_ITEM = '/html/body/div[1]/div/main/div/div[2]/div/div/div/div';
	const XPATH_EXPRESSION_ITEM_TITLE = './/article/h2';
	const XPATH_EXPRESSION_ITEM_CONTENT = './/article/p';
	const XPATH_EXPRESSION_ITEM_URI = './/a[@class="bc-link bc-link--internal bc-link--button bc-link--primary bc-news-tile__article-link"]/@href';
	const XPATH_EXPRESSION_ITEM_AUTHOR = '';
	const XPATH_EXPRESSION_ITEM_TIMESTAMP = '/html/body/div[1]/div/main/div/div[2]/div/div/div/div/@publishdate';
	const XPATH_EXPRESSION_ITEM_ENCLOSURES = './/div/img/@src';
	const XPATH_EXPRESSION_ITEM_CATEGORIES = '';
	const SETTING_FIX_ENCODING = false;

	/**
	 * Source Web page URL (should provide either HTML or XML content)
	 * @return string
	 */
	protected function getSourceUrl(){

        $locale = $this->getInput('locale');
		return 'https://playwonderlands.2k.com/news/';
	}
}