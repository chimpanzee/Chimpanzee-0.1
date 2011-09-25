<?php
final class CZCurlGetRoot extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		if (strpos($_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME']) !== FALSE) {
			$url = $_SERVER['SCRIPT_NAME'];
		} else {
			$url = dirname($_SERVER['SCRIPT_NAME']);
		}
		
		return $url;
	}
}
?>