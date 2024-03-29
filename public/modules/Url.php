<?php
final class CZMUrl extends CZBase
{
	/**
	 * @param boolean secure_flag <option>
	 * @param array   $params(
	 *   'routing' => array(
	 *     string Parameter value
	 *     ...
	 *   ) <option>
	 *   'get' => array(
	 *     string Parameter name => string Parameter value
	 *     ...
	 *   ) <option>
	 * ) <option>
	 * 
	 * @return string URL
	 * 
	 * @author Shin Uesugi
	 */
	public function getRoot($secure_flag = FALSE, $params = NULL)
	{
		return $this->_cz->newCore('url', 'get_root')->exec($secure_flag, $params);
	}
	
	
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