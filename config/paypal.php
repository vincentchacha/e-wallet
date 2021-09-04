<?php 
return array(
/** set your paypal credential **/


//TODO:Racheal=> Remember to Transfer this to .env file
'client_id' =>'Ab7Aif-97DE7MTTex5xV_pVu9LRCoXlcUlpGlkILmnQE6gu7i8wiiBtm3ErHDiEtp5Gf_KMXhfX4NWw6',
'secret' => 'EDXYRLQFxl_Od-PNFRDEknrdiyukSQHoGXcaQlJjioEkiVnXPgsjptXGhlPHsOB_5TyflL0i_NoE-UJH',
/**
* SDK configuration 
*/
'settings' => array(
	/**
	* Available option 'sandbox' or 'live'
	*/
	'mode' => 'sandbox',
	/**
	* Specify the max request time in seconds
	*/
	'http.ConnectionTimeOut' => 1000,
	/**
	* Whether want to log to a file
	*/
	'log.LogEnabled' => true,
	/**
	* Specify the file that want to write on
	*/
	'log.FileName' => storage_path() . '/logs/paypal.log',
	/**
	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	*
	* Logging is most verbose in the 'FINE' level and decreases as you
	* proceed towards ERROR
	*/
	'log.LogLevel' => 'FINE'
	),
);