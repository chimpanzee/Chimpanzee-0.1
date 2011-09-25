<?php
final class CZMUrl extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getSelf()
	{
		return $this->_cz->newCore('url', 'get_self')->exec();
	}
	
	
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getImages()
	{
		return $this->_cz->newCore('url', 'get_images')->exec();
	}
}
?>