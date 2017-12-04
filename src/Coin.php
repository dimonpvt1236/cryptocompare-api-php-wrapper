<?php

namespace Cryptocompare;

class Coin extends CryptocompareApi
{

	/**
	 * @return bool|mixed - returns general info for all the coins available on the website.
	 */
	public function getList($sign = false)
	{
		$params = [
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/all/coinlist', $params);
		return $r;
	}


	/**
	 * @param string $fsym
	 * @param string $tsym
	 * @return bool|mixed
	 */
	public function getSnapshot($fsym = 'BTC', $tsym = 'EUR')
	{
		$params = [
			'fsym' => $fsym,
			'tsym' => $tsym
		];
		$r = $this->getRequest('private', '/coinsnapshot', $params);
		return $r;
	}


	/**
	 * @param int $id
	 * @return bool|mixed
	 */
	public function getSnapshotFullById($id = 0)
	{
		$params = [
			'id' => $id,
		];
		$r = $this->getRequest('private', '/coinsnapshotfullbyid', $params);
		return $r;
	}


	/**
	 * @param int $id
	 * @return bool|mixed
	 */
	public function getSocialStats($id = 0)
	{
		$params = [
			'id' => $id,
		];
		$r = $this->getRequest('private', '/socialstats', $params);
		return $r;
	}


}