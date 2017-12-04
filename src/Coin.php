<?php

namespace Cryptocompare;

class Coin extends CryptocompareApi
{

	/**
	 * Get general info for all the coins available.
	 * @param bool $sign Should server sign the request?
	 * @return bool|mixed
	 */
	public function getList(bool $sign = false)
	{
		$params = [
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/all/coinlist', $params);
		return $r;
	}


	/**
	 * Get data for a currency pair. It returns general block explorer information,
	 * aggregated data and individual data for each exchange available.
	 * @param string $fsym
	 * @param string $tsym
	 * @return bool|mixed
	 */
	public function getSnapshot(string $fsym = 'BTC', string $tsym = 'EUR')
	{
		$params = [
			'fsym' => $fsym,
			'tsym' => $tsym
		];
		$r = $this->getRequest('private', '/coinsnapshot', $params);
		return $r;
	}


	/**
	 * Get the general, subs (used to connect to the streamer and to figure out
	 * what exchanges we have data for and what are the exact coin pairs of the coin)
	 * and the aggregated prices for all pairs available.
	 * @param int $id
	 * @return bool|mixed
	 */
	public function getSnapshotFullById(int $id = 0)
	{
		$params = [
			'id' => $id,
		];
		$r = $this->getRequest('private', '/coinsnapshotfullbyid', $params);
		return $r;
	}


	/**
	 * Get CryptoCompare website, Facebook, code repository, Twitter and Reddit data for coins.
	 * If called with the id of a cryptopian you just get data from our website that is available to the public.
	 * (maybe in v2 add the rest of the fields for the cryptopian as well?)
	 * @param int $id
	 * @return bool|mixed
	 */
	public function getSocialStats(int $id = 0)
	{
		$params = [
			'id' => $id,
		];
		$r = $this->getRequest('private', '/socialstats', $params);
		return $r;
	}


}