<?php
final class CZCredirectRoot extends CZBase
{
	/**
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		$url = $this->_cz->newCore('url', 'get_root')->exec();
		$this->_cz->newCore('redirect', 'url')->exec($url);
	}
}
?>