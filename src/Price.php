<?php

namespace Cryptocompare;

class Price extends CryptocompareApi
{

	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param string $fsym - base currency to convert from
	 * @param array $tsyms - currencies to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 * Description: Get data for a currency pair. It returns general block explorer information, aggregated data and individual data for each exchange available.
	 */
	public function getSinglePrice(bool $tryConversion = true, $fsym = 'BTC',
		$tsyms = ['USD', 'EUR'], $e = 'CCCAGG', bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsyms' => $tsyms,
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/price', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param array $fsym - base currencies to convert from
	 * @param array $tsyms - currencies to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getMultiPrice(bool $tryConversion = true, $fsyms = ['BTC', 'ETH'],
		$tsyms = ['USD', 'EUR'], $e = 'CCCAGG', bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsyms' => join(',', $fsyms),
			'tsyms' => join(',', $tsyms),
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/pricemulti', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param array $fsym - base currencies to convert from
	 * @param array $tsyms - currencies to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getHistoricalPrice(bool $tryConversion = true, $fsym = 'BTC',
		array $tsyms = ['USD', 'EUR'], $ts = '1507469305', $e = 'CCCAGG',
		bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsyms' => join(',', $tsyms),
			'e' => $e,
			'sign' => $sign,
			'ts' => $ts,
		];
		$r = $this->getRequest('public', '/data/pricehistorical', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param array $fsyms - base currencies to convert from
	 * @param array $tsyms - currencies to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getMultiPriceFull(bool $tryConversion = true,
		$fsyms = ['BTC', 'ETH'], $tsyms = ['USD', 'EUR'], $e = 'CCCAGG', bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsyms' => join(',', $fsyms),
			'tsyms' => join(',', $tsyms),
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/pricemultifull', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param string $fsym - base currency to convert from
	 * @param string $tsym - currency to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getGenerateAvg(bool $tryConversion = true, $fsym = 'BTC',
		$tsym = 'EUR', $e = 'Coinbase,Kraken', bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsym' => $tsym,
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/generateAvg', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param string $fsym - base currency to convert from
	 * @param string $tsym - currency to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getDayAvg(bool $tryConversion = true, $fsym = 'BTC', $tsym = 'EUR',
		$e = 'CCCAGG', $avgType = 'HourVWAP', $UTCHourDiff = 0, $toTs = '1487116800',
		bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'avgType' => $avgType,
			'UTCHourDiff' => $UTCHourDiff,
			'toTs' => $toTs,
			'fsym' => $fsym,
			'tsym' => $tsym,
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/dayAvg', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param array $fsyms - base currencies to convert from
	 * @param string $tsym - currency to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getSubsWatchlist(bool $tryConversion = true, $fsyms = ['BTC', 'ETH'],
		$tsym = 'EUR', $e = 'CCCAGG', bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsyms' => join(',', $fsyms),
			'tsym' => $tsym,
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/subsWatchlist', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion - type of currency to convert from - default: BTC
	 * @param string $fsym - base currency to convert from
	 * @param array $tsyms - currencies to convert to
	 * @param string $e - the exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getSubs(bool $tryConversion = true, $fsym = 'BTC',
		$tsyms = ['USD', 'EUR'], $e = 'CCCAGG', bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsyms' => join(',', $tsyms),
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/subs', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion
	 * @param string $fsym
	 * @param string $tsym
	 * @param string $e
	 * @param bool $sign Should server sign the request?
	 * @param int $aggregate
	 * @param int $limit
	 * @param null $toTs
	 * @return bool|mixed
	 */
	public function getHistoMinute(bool $tryConversion = true, $fsym = 'BTC',
		$tsym = 'EUR', $e = 'CCCAGG', bool $sign = false, $aggregate = 1, $limit = 1440,
		$toTs = NULL)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsym' => $tsym,
			'e' => $e,
			'sign' => $sign,
			'aggregate' => $aggregate,
			'limit' => $limit,
			'toTs' => $toTs,
		];
		$r = $this->getRequest('public', '/data/histominute', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion
	 * @param string $fsym
	 * @param string $tsym
	 * @param string $e
	 * @param bool $sign Should server sign the request?
	 * @param int $aggregate
	 * @param int $limit
	 * @param null $toTs
	 * @return bool|mixed
	 */
	public function getHistoHour(bool $tryConversion = true, $fsym = 'BTC',
		$tsym = 'EUR', $e = 'CCCAGG', bool $sign = false, $aggregate = 1, $limit = 1440,
		$toTs = NULL)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsym' => $tsym,
			'e' => $e,
			'sign' => $sign,
			'aggregate' => $aggregate,
			'limit' => $limit,
			'toTs' => $toTs,
		];
		$r = $this->getRequest('public', '/data/histohour', $params);
		return $r;
	}


	/**
	 * @param bool $tryConversion
	 * @param string $fsym
	 * @param string $tsym
	 * @param string $e
	 * @param bool $sign Should server sign the request?
	 * @param int $aggregate
	 * @param int $limit
	 * @param null $toTs
	 * @return bool|mixed
	 */
	public function getHistoDay(bool $tryConversion = true, $fsym = 'BTC', $tsym = 'EUR',
		$e = 'CCCAGG', bool $sign = false, $aggregate = 1, $limit = 1440, $toTs = NULL)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsym' => $tsym,
			'e' => $e,
			'sign' => $sign,
			'aggregate' => $aggregate,
			'limit' => $limit,
			'toTs' => $toTs,
		];
		$r = $this->getRequest('public', '/data/histoday', $params);
		return $r;
	}


}