<?php
final class CZCurlGetJS extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		if (!$this->_cz->isValidStr($url = $this->_cz->newUser('config', 'url')->getValue('js', ''))) {
			$root_url = $this->_cz->newCore('url', 'get_root')->exec();
			$url = $root_url . '/' . $this->_cz->newUser('config', 'url')->getValue('js_relative_path', 'js');
		}
		
		return $url;
	}
}
?>