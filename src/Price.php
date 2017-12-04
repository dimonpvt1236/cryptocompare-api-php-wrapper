<?php

namespace Cryptocompare;

class Price extends CryptocompareApi
{

	/**
	 * Get the latest price for a list of one or more currencies.
	 * Really fast, 20-60 ms. Cached each 10 seconds.
	 *
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param string $fsym Symbol to convert from
	 * @param array $tsyms Symbols to convert to
	 * @param string $e Name of exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getSinglePrice(bool $tryConversion = true,
		string $fsym = 'BTC', array $tsyms = ['USD', 'EUR'], string $e = 'CCCAGG',
		bool $sign = false)
	{
		$params = [
			'tryConversion' => $tryConversion,
			'fsym' => $fsym,
			'tsyms' => join(',', $tsyms),
			'e' => $e,
			'sign' => $sign
		];
		$r = $this->getRequest('public', '/data/price', $params);
		return $r;
	}


	/**
	 * Get a matrix of currency prices.
	 *
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param array $fsyms Symbols to convert from
	 * @param array $tsyms Symbols to convert to
	 * @param string $e Name of exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getMultiPrice(bool $tryConversion = true,
		array $fsyms = ['BTC', 'ETH'], array $tsyms = ['USD', 'EUR'],
		string $e = 'CCCAGG', bool $sign = false)
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
	 * Get the price of any cryptocurrency in any other currency that you need at a given timestamp.
	 * The price comes from the daily info - so it would be the price at the end of the day GMT based on the requested TS.
	 *
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param array $fsym Symbol to convert from
	 * @param array $tsyms Symbols to convert to
	 * @param int $ts Timestamp
	 * @param string $e Name of exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getHistoricalPrice(bool $tryConversion = true,
		string $fsym = 'BTC', array $tsyms = ['USD', 'EUR'], int $ts = 1507469305,
		string $e = 'CCCAGG', bool $sign = false)
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
	 * Get all the current trading info (price, vol, open, high, low etc)
	 * of any list of cryptocurrencies in any other currency that you need.
	 * If the crypto does not trade directly into the toSymbol requested,
	 * BTC will be used for conversion.
	 * This API also returns Display values for all the fields.
	 * If the opposite pair trades we invert it (eg.: BTC-XMR).
	 *
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param array $fsyms Symbols to convert from
	 * @param array $tsyms Symbols to convert to
	 * @param string $e Name of exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getMultiPriceFull(bool $tryConversion = true,
		array $fsyms = ['BTC', 'ETH'], array $tsyms = ['USD', 'EUR'],
		string $e = 'CCCAGG', bool $sign = false)
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
	 * Compute the current trading info (price, vol, open, high, low etc) of the requested pair
	 * as a volume weighted average based on the markets requested.
	 *
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param string $fsym Symbol to convert from
	 * @param string $tsym Symbol to convert to
	 * @param string $e Name of exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getGenerateAvg(bool $tryConversion = true,
		string $fsym = 'BTC', string $tsym = 'EUR', string $e = 'CCCAGG',
		bool $sign = false)
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
	 * Get day average price.
	 *
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param string $fsym Symbol to convert from
	 * @param string $tsym Symbol to convert to
	 * @param string $e Name of exchange
	 * @param string $avgType
	 * @param int $UTCHourDiff By deafult it does UTC, if you want a different time zone just pass the hour difference. For PST you would pass -8 for example.
	 * @param int $toTs Timestamp
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 */
	public function getDayAvg(bool $tryConversion = true, string $fsym = 'BTC',
		string $tsym = 'EUR', string $e = 'CCCAGG', string $avgType = 'HourVWAP',
		int $UTCHourDiff = 0, int $toTs = 1487116800, bool $sign = false)
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
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param array $fsyms - base currencies to convert from
	 * @param string $tsym Symbol to convert to
	 * @param string $e Name of exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 * @deprecated No mention in official api docs https://www.cryptocompare.com/api/
	 */
	public function getSubsWatchlist(bool $tryConversion = true,
		array $fsyms = ['BTC', 'ETH'], string $tsym = 'EUR', string $e = 'CCCAGG',
		bool $sign = false)
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
	 * @param bool $tryConversion If false, try to get values w/o using any conversion at all?
	 * @param string $fsym Symbol to convert from
	 * @param array $tsyms Symbols to convert to
	 * @param string $e Name of exchange
	 * @param bool $sign Should server sign the request?
	 * @return mixed
	 * @deprecated No mention in official api docs https://www.cryptocompare.com/api/
	 */
	public function getSubs(bool $tryConversion = true, string $fsym = 'BTC',
		array $tsyms = ['USD', 'EUR'], string $e = 'CCCAGG', bool $sign = false)
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
	 * Get open, high, low, close, volumefrom and volumeto from the each minute historical data.
	 * This data is only stored for 7 days, if you need more,use the hourly or daily path.
	 * It uses BTC conversion if data is not available because the coin is not trading in the specified currency.
	 *
	 * @param bool $tryConversion
	 * @param string $fsym
	 * @param string $tsym
	 * @param string $e
	 * @param bool $sign Should server sign the request?
	 * @param int $aggregate
	 * @param int $limit Max 2000
	 * @param ?int $toTs
	 * @return bool|mixed
	 */
	public function getHistoMinute(bool $tryConversion = true,
		string $fsym = 'BTC', string $tsym = 'EUR', string $e = 'CCCAGG',
		bool $sign = false, $aggregate = 1, int $limit = 1440, ?int $toTs = NULL)
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
	 * Get open, high, low, close, volumefrom and volumeto from the each hour historical data.
	 * It uses BTC conversion if data is not available because the coin is not trading in the specified currency.
	 *
	 * @param bool $tryConversion
	 * @param string $fsym
	 * @param string $tsym
	 * @param string $e
	 * @param bool $sign Should server sign the request?
	 * @param int $aggregate
	 * @param int $limit Max 2000
	 * @param ?int $toTs
	 * @return bool|mixed
	 */
	public function getHistoHour(bool $tryConversion = true, string $fsym = 'BTC',
		$tsym = 'EUR', string $e = 'CCCAGG', bool $sign = false, int $aggregate = 1,
		int $limit = 1440, ?int $toTs = NULL)
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
	 * Get open, high, low, close, volumefrom and volumeto daily historical data.
	 * The values are based on 00:00 GMT time.
	 * It uses BTC conversion if data is not available because the coin is not trading in the specified currency.
	 *
	 * @param bool $tryConversion
	 * @param string $fsym
	 * @param string $tsym
	 * @param string $e
	 * @param bool $sign Should server sign the request?
	 * @param int $aggregate
	 * @param int $limit Max 2000
	 * @param ?int $toTs
	 * @param bool $getAllData
	 * @return bool|mixed
	 */
	public function getHistoDay(bool $tryConversion = true, string $fsym = 'BTC',
		string $tsym = 'EUR', string $e = 'CCCAGG', bool $sign = false,
		$aggregate = 1, int $limit = 1440, ?int $toTs = NULL, bool $getAllData = false)
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
			'allData' => $getAllData,
		];
		$r = $this->getRequest('public', '/data/histoday', $params);
		return $r;
	}


}