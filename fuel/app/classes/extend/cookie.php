<?php

use \Foolz\Config\Config;

class Cookie
{

	public static function get($name = null, $default = null)
	{
		return \Fuel\Core\Cookie::get($name, $default);
	}

	public static function set($name, $value, $expiration = null, $path = null, $domain = null, $secure = null, $http_only = null)
	{
		return \Fuel\Core\Cookie::set(Config::get('foolz/foolframe', 'package', 'config.cookie_prefix').$name, $value, $expiration, $path, $domain, $secure, $http_only);
	}

	public static function delete($name, $path = null, $domain = null, $secure = null, $http_only = null)
	{
		return \Fuel\Core\Cookie::delete(Config::get('foolz/foolframe', 'package', 'config.cookie_prefix').$name, $path, $domain, $secure, $http_only);
	}
}