<?php
final class CZCurlGetCss extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		if (!$this->_cz->isValidStr($url = $this->_cz->newUser('config', 'url')->getValue('css', ''))) {
			$root_url = $this->_cz->newCore('url', 'get_root')->exec();
			$url = $root_url . '/' . $this->_cz->newUser('config', 'url')->getValue('css_relative_path', 'css');
		}
		
		return $url;
	}
}
?>