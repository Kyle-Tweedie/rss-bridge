<?php

class AlbumoftheyearBridge extends XPathAbstract {

	const NAME = 'New Album Releases';
	const URI = 'https://www.albumoftheyear.org/releases/';
	const DESCRIPTION = 'New Album Releases from albumoftheyear.org';
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

	const XPATH_EXPRESSION_ITEM = '/html/body/div[4]/div/div[1]/div[@class="albumBlock five"]';
	const XPATH_EXPRESSION_ITEM_TITLE = './/div[@class="artistTitle"]';
	const XPATH_EXPRESSION_ITEM_CONTENT = './/dirv[@class="albumTitle"]';
	const XPATH_EXPRESSION_ITEM_URI = './/a[2]/@href';
	const XPATH_EXPRESSION_ITEM_AUTHOR = '';
	const XPATH_EXPRESSION_ITEM_TIMESTAMP = '';
	const XPATH_EXPRESSION_ITEM_ENCLOSURES = './/img[@class=" lazyloaded"]/@src';
	const XPATH_EXPRESSION_ITEM_CATEGORIES = '';
	const SETTING_FIX_ENCODING = false;

	/**
	 * Source Web page URL (should provide either HTML or XML content)
	 * @return string
	 */
	protected function getSourceUrl(){

        $locale = $this->getInput('locale');
		return 'https://www.albumoftheyear.org/releases/';
	}
}