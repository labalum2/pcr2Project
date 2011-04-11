<?php

class Response
{
	const MISSING_PARAMETER = "400";
	const UNAUTHORIZED = "401";
	const SQL = "1400";
	const OK = "200";

	static public function send($code, $msg = "")
	{
		if($code == Response::MISSING_PARAMETER)
			$msg = "Parameter missing";
		else if($code == Response::OK)
			$msg = "OK";
		else if($code == Response::UNAUTHORIZED)
			$msg = "Unauthorized";
		
		header('HTTP/1.0 '.$code.' '.$msg);
		exit;
	}
}

?>