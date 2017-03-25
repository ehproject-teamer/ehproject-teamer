<?php
/**
 * 通过curl实现的快捷方便的接口请求类
 * 
 * @author dogstar 2014-10-26
 */

class Curl {
	
	public static function quickGet($url, $timeoutMs = 3000,$header = null)
	{
		return self::doRequest($url, false, $timeoutMs);
	} 
	
	public static function quickPost($url, $data, $timeoutMs = 3000,$header = null)
	{
		return self::doRequest($url, $data, $timeoutMs);
	}
	
	protected static function doRequest($url, $data, $timeoutMs = 3000,$header = null)
	{
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//		curl_setopt($ch, CURLOPT_HEADER, 0);
		if(!empty($timeoutMs))curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $timeoutMs);
		if(!empty($header))curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');  
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');
 
		
		if (!empty($data)) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		
		$rs = curl_exec($ch);
		
		curl_close($ch);
		
		return $rs;
	}
}
