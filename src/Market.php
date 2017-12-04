<?php

namespace Cryptocompare;

class Market extends CryptocompareApi
{

	/**
	 * @param string $fsym
	 * @param string $tsym
	 * @param int $limit
	 * @param bool $sign Should server sign the request?
	 * @return bool|mixed
	 */
	public function getTopPairs($fsym = 'BTC', $limit = 5, bool $sign = false)
	{
		$params = [
			'fsym' => $fsym,
			'limit' => $limit,
			'sign' => $sign,
		];
		$pairs = $this->getRequest('public', '/data/top/pairs', $params);
		return $pairs;
	}


	/**
	 * @param string $fsym - base currency to convert from
	 * @param string $tsym - currency to convert to
	 * @param int $limit - limit of results
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getTopExchanges($fsym = 'BTC', $tsym = 'EUR', $limit = 5,
		bool $sign = false)
	{

		$params = [
			'limit' => $limit,
			'fsym' => $fsym,
			'tsym' => $tsym,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/top/exchanges', $params);
		return $r;
	}


	/**
	 * @param string $tsym - currency to convert to
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getTopVolumes($tsym = 'EUR', $limit = 20, bool $sign = false)
	{

		$params = [
			'limit' => $limit,
			'tsym' => $tsym,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/top/volumes', $params);
		return $r;
	}


	/**
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getList(bool $sign = false)
	{
		$params = [
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/all/exchanges', $params);
		return $r;
	}


}