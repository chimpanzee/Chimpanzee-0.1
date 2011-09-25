<?php
final class CZCformSaveErr extends CZBase
{
	/**
	 * @param string $part_name
	 * @param string $msg
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($part_name, $msg)
	{
		$msgs = $this->_cz->newCore('ses', 'get')->exec('form_err_msgs', array());
		$msgs[$part_name] = $msg;
		$this->_cz->newCore('ses', 'set')->exec('form_err_msgs', $msgs);
	}
}
?>