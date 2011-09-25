<?php
final class CZCurlGetImages extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		if (!$this->_cz->isValidStr($url = $this->_cz->newUser('config', 'url')->getValue('images', ''))) {
			$root_url = $this->_cz->newCore('url', 'get_root')->exec();
			$url = $root_url . '/' . $this->_cz->newUser('config', 'url')->getValue('images_relative_path', 'images');
		}
		
		return $url;
	}
}
?>