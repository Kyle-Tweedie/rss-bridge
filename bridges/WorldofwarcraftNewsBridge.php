<?php

class WorldofwarcraftNewsBridge extends XPathAbstract {

	const NAME = 'World of Warcraft News';
	const URI = 'https://worldofwarcraft.com/news';
	const DESCRIPTION = 'World of Warcraft newsfeed';
	const MAINTAINER = 'Kyle-Tweedie';
	const PARAMETERS = array(
		'' => array(
			'locale' => array(
				'name' => 'Language',
				'type' => 'list',
				'values' => array(
					'Deutsch' => 'de-de',
					'English (EU)' => 'en-gb',
					'English (US)' => 'en-us',
				),
				'defaultValue' => 'en-us',
				'title' => 'Select your language'
			)
		)
	);
	const CACHE_TIMEOUT = 3600;

	const XPATH_EXPRESSION_ITEM = '/html/body/div[1]/div/main/div/div[2]/div/div[2]/div[5]/div[2]/div/div[1]/div[1]/div[1]/div/div/article';
	const XPATH_EXPRESSION_ITEM_TITLE = './/div/div/div[2]/div[2]/div/div/div/div/time/@datetime';
	const XPATH_EXPRESSION_ITEM_CONTENT = './/div/div/div[2]/div[1]/p';
	const XPATH_EXPRESSION_ITEM_URI = './/a[@class="Link NewsBlog-link"]/@href';
	const XPATH_EXPRESSION_ITEM_AUTHOR = '';
	const XPATH_EXPRESSION_ITEM_TIMESTAMP = './/div/div/div[2]/div[2]/div/div/div/div/time/@datetime';
	const XPATH_EXPRESSION_ITEM_ENCLOSURES = '';
	const XPATH_EXPRESSION_ITEM_CATEGORIES = '';
	const SETTING_FIX_ENCODING = true;

	/**
	 * Source Web page URL (should provide either HTML or XML content)
	 * @return string
	 */
	protected function getSourceUrl(){

		$locale = $this->getInput('locale');
		return 'https://worldofwarcraft.com/' . $locale . '/news';
	}
}

// /html/body/div[1]/div/main/div/div[2]/div/div[2]/div[5]/div[2]/div/div[1]/div[1]/div[1]/div/div[1]/article/div/div/div[2]/div[2]/div/div/div/div/time