<?php defined('SYSPATH') OR die('No direct script access.');

return array(

	'trusted_hosts' => array(
		//'localhost',
		//'127.0.0.1',
		$_SERVER['HTTP_HOST']
		// Set up your hostnames here
		//
		// Example:
		//
		//        'example\.org',
		//        '.*\.example\.org',
		//
		// Do not forget to escape your dots (.) as these are regex patterns.
		// These patterns should always fully match,
		// as they are prepended with `^` and appended with `$`
	),

);
