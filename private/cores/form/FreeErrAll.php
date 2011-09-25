<?php
final class CZCformFreeErrAll extends CZBase
{
	/**
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		$this->_cz->newCore('ses', 'free')->exec('form_err_msgs');
	}
}
?>