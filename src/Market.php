<?php

namespace Cryptocompare;

class Market extends CryptocompareApi
{

	/**
	 * Get top pairs by volume for a currency (always uses CC aggregated data).
	 * @param string $fsym
	 * @param int $limit
	 * @param bool $sign Should server sign the request?
	 * @return bool|mixed
	 */
	public function getTopPairs(string $fsym = 'BTC', int $limit = 5,
		bool $sign = false)
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
	 * @param string $fsym Currency to convert from
	 * @param string $tsym Currency to convert to
	 * @param int $limit Limit of results
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 * @deprecated No mention in official api docs https://www.cryptocompare.com/api/
	 */
	public function getTopExchanges(string $fsym = 'BTC', string $tsym = 'EUR',
		int $limit = 5, bool $sign = false)
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
	 * @param string $tsym Currency to convert to
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 * @deprecated No mention in official api docs https://www.cryptocompare.com/api/
	 */
	public function getTopVolumes(string $tsym = 'EUR', int $limit = 20,
		bool $sign = false)
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
	 * @deprecated No mention in official api docs https://www.cryptocompare.com/api/
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