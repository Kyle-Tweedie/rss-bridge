<?php
class WorldofwarcraftNewsBridge extends BridgeAbstract {

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

	public function collectData() {
		$url = 'https://worldofwarcraft.com/' . $this->getInput('locale') . '/news';
		$html = getSimpleHTMLDOM($url)->find('.NewsBlog', 0);
		$html = defaultLinkTo($html, $this->getURI());

		foreach($html->find('._2H7Su') as $article) {
			$item = array();

			$title = $article->find('.NewsBlog-title', 0);
			$item['title'] = $title->plaintext;
			$item['uri'] = $title->href;
			$item['content'] = $article->find('.NewsBlog-desc color-beige-medium font-size-xSmall', 0)->plaintext;
			$item['timestamp'] = strtotime($article->find('time', 0)->datetime);

			$this->items[] = $item;
		}
	}
}
