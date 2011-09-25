<?php
final class CZCformIsErr extends CZBase
{
	/**
	 * @return boolean
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		$err_msgs = $this->_cz->newCore('ses', 'get')->exec('form_err_msgs', array());

		return count($err_msgs) > 0;
	}
}
?>