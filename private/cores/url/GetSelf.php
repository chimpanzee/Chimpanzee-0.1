<?php
final class CZCurlGetSelf extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		return $_SERVER['REQUEST_URI'];
	}
}
?>