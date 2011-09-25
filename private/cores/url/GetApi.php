<?php
final class CZCurlGetApi extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		if (!$this->_cz->isValidStr($url = $this->_cz->newUser('config', 'url')->getValue('api', ''))) {
			$root_url = $this->_cz->newCore('url', 'get_root')->exec();
			$url = $root_url . '/' . $this->_cz->newUser('config', 'url')->getValue('api_relative_path', 'api');
		}
		
		return $url;
	}
}
?>