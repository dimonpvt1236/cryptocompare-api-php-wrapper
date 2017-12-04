<?php

namespace Cryptocompare;

class CryptocompareApi
{
	// the following variables should be set by you
	/**
	 * @var string Application name, to be set in __construct()
	 */
	private $appName = 'default_php_wrapper';

	/**
	 * @var bool If set to true will die() and print exception when http request fails -> not recommended in production enviroment
	 */
	private $debug = false;


	// do not edit bellow unless you know what you are doing

	/**
	 * @var string publicEndpoint url, applies to all requests that do not need a session key to work
	 */
	public $publicEndpoint = 'https://min-api.cryptocompare.com';

	/**
	 * @var string privateEndpoint url, applies to all requests that do need a session key to work
	 */
	public $privateEndpoint = 'https://www.cryptocompare.com/api/data';

	/**
	 * @var array Contains strings with errors
	 */
	public $errorMessages = [];

	/**
	 * @var string Http status code from server
	 */
	public $statusCode = 'unset';

	/**
	 * @var string Http response body
	 */
	public $body = '';


	/**
	 * Retrieve an array of objects listing all available api endpoints.
	 * @return bool|mixed
	 */
	public function getAvailableCalls()
	{
		$calls = $this->getRequest('public', '/');
		return $calls;
	}


	/**
	 * Get all the mining contracts in a JSON array.
	 * @return bool|mixed
	 */
	public function getMiningContracts()
	{
		$contracts = $this->getRequest('private', '/miningcontracts');
		return $contracts;
	}


	/**
	 * Get all the mining equipment available on the website. It returns an array of mining equipment objects.
	 * @return bool|mixed
	 */
	public function getMiningEquipment()
	{
		$equipment = $this->getRequest('private', '/miningequipment');
		return $equipment;
	}


	/**
	 * @param bool $sign Should server sign the request?
	 * @return bool|mixed
	 * @deprecated No mention in official api docs https://www.cryptocompare.com/api/
	 */
	public function getNewsProviders(bool $sign = false)
	{
		$params = [
			'sign' => $sign,
		];
		$equipment = $this->getRequest('public', '/data/news/providers', $params);
		return $equipment;
	}


	/**
	 * @param string $feeds
	 * @param bool $lTs
	 * @param string $lang
	 * @param bool $sign Should server sign the request?
	 * @return bool|mixed
	 * @deprecated No mention in official api docs https://www.cryptocompare.com/api/
	 */
	public function getNews(string $feeds = 'ALL_NEWS_FEEDS', bool $lTs = false,
		string $lang = 'EN', bool $sign = false)
	{
		$params = [
			'feeds' => $feeds,
			'lTs' => $lTs,
			'lang' => $lang,
			'sign' => $sign,
		];
		$equipment = $this->getRequest('public', '/data/news/providers', $params);
		return $equipment;
	}


	/**
	 * @param string $timespan Available options: hour / second
	 * @return bool|mixed
	 */
	public function getRateLimits($timespan = 'hour')
	{
		if ($timespan === 'hour' || $timespan === 'second') {
			$limits = $this->getRequest('public', "/stats/rate/$timespan/limit");
			return $limits;
		} else {
			$this->errorMessages[] = 'avaiable options for timespan are hour or second';
			return false;
		}
	}


	/**
	 * Get array of strings with errors occurred during the request.
	 * @return array
	 */
	private function getErrorMessages()
	{
		return $this->errorMessages;
	}


	/**
	 * Send request to api endpoint.
	 * @param string $type
	 * @param string $action
	 * @param array $options
	 * @return bool|mixed
	 */
	public function getRequest(string $type = 'public', string $action = '',
		array $options = [])
	{
		if ($action === '') {
			$this->errorMessages[] = 'no $action submitted';
			return false;
		}
		if ($type === 'public') {
			$uri = $this->publicEndpoint . $action;
		} elseif ($type === 'private') {
			$uri = $this->privateEndpoint . $action;
		} else {
			$this->errorMessages[] = 'invalid request $type specified';
			return false;
		}
		try {
			if ($this->debug === true) {
				echo 'URI: ' . $uri . '<br>' . PHP_EOL;
			}
			if (empty($options['extraParams'])) {
				$options['extraParams'] = $this->appName;
			}
			$client = new \GuzzleHttp\Client(['verify' => false]);
			$res = $client->request('GET', $uri, [
				'query' => $options
			]);
			$this->statusCode = $res->getStatusCode();
			$this->header = $res->getHeader('content-type');
			$this->body = $res->getBody()->getContents();
			return json_decode($this->body);
		} catch (\Exception $e) {
			if ($this->debug === true) {
				echo 'HTTP response code:' . $this->statusCode;
				print_r(json_decode($this->body));
				die();
			}
		}
	}


	/**
	 * CryptocompareApi constructor.
	 * @param string $appName
	 * @param bool $debug
	 */
	function __construct(string $appName, bool $debug = false)
	{
		$this->appName = $appName;
		$this->setDebug($debug);
	}


	/**
	 * @param bool $debug
	 */
	public function setDebug(bool $debug)
	{
		$this->debug = $debug;
	}


}