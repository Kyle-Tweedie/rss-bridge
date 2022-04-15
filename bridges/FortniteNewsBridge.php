<?php

class FortniteNewsBridge extends XPathAbstract {

	const NAME = 'Fortnite News';
	const URI = 'https://www.epicgames.com/fortnite/news';
	const DESCRIPTION = 'News from https://www.epicgames.com/fortnite/en-US/news';
	const MAINTAINER = 'Kyle-Tweedie';
	const PARAMETERS = array(
		'' => array(
			'locale' => array(
				'name' => 'Language',
				'type' => 'list',
				'values' => array(
					'English (US)' => 'en-US'
				),
				'defaultValue' => 'en-us',
				'title' => 'Select your language'
			)
		)
	);
	const CACHE_TIMEOUT = 3600;

	const XPATH_EXPRESSION_ITEM = '/html/body/div[1]/div/div/div[3]/div/div/div/div[3]/div/a';
	const XPATH_EXPRESSION_ITEM_TITLE = './/@title';
	const XPATH_EXPRESSION_ITEM_CONTENT = '';
	const XPATH_EXPRESSION_ITEM_URI = './/@href';
	const XPATH_EXPRESSION_ITEM_AUTHOR = '';
	const XPATH_EXPRESSION_ITEM_TIMESTAMP = './/h4';
	const XPATH_EXPRESSION_ITEM_ENCLOSURES = './/img/@src';
	const XPATH_EXPRESSION_ITEM_CATEGORIES = '';
	const SETTING_FIX_ENCODING = false;

	/**
	 * Source Web page URL (should provide either HTML or XML content)
	 * @return string
	 */
	protected function getSourceUrl(){

        $locale = $this->getInput('locale');
		return 'https://www.epicgames.com/fortnite/' . $locale . '/news';
	}
}