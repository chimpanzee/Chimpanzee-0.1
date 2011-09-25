<?php
final class CZCredirectAction extends CZBase
{
	/**
	 * @param string $action_name
	 * @param string $action_group_name / FALSE (Set FALSE by self::exec)
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	public function _exec($action_name, $action_group_name = '', $ctrl_name = '')
	{
		$url = $this->_cz->newCore('url', 'get_action')->_exec($action_name, $action_group_name, $ctrl_name);
		$this->_cz->newCore('redirect', 'url')->exec($url);
	}
	
	/**
	 * @param string $action_name
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($action_name, $ctrl_name = '')
	{
		return self::_exec($action_name, FALSE, $ctrl_name);
	}
}
?>