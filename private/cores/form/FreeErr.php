<?php
final class CZCformFreeErr extends CZBase
{
	/**
	 * @param string $part_name
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($part_name)
	{
		if ($msgs = $this->_cz->newCore('ses', 'get')->exec('form_err_msgs', array())) {
			unset($msgs[$part_name]);
			$this->_cz->newCore('ses', 'set')->exec('form_err_msgs', $msgs);
		}
	}
}
?>