<?php
final class CZCurlGetAction extends CZBase
{
	/**
	 * @param string $action_name
	 * @param string $action_group_name / FALSE (Set FALSE by self::exec)
	 * @param string $ctrl_name
	 * 
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function _exec($action_name, $action_group_name = '', $ctrl_name = '')
	{
		if ($ctrl_name === '') {
			$ctrl_name = $this->_cz->newCore('forward', 'get_ctrl_name')->exec();
		}
		if ($action_group_name === '') {
			$action_group_name = $this->_cz->newCore('forward', 'get_action_group_name')->exec();
		}
		
		$url  = $this->_cz->newCore('url', 'get_root')->exec();
		$url .= '/' . $ctrl_name;
		if ($this->_cz->isValidStr($action_group_name)) {
			$url .= '/' . $action_group_name;
		}
		if ($action_name != 'index') {
			$url .= '/' . $action_name;
		}
		
		return $url;
	}
	
	/**
	 * @param string $action_name
	 * @param string $ctrl_name
	 * 
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($action_name, $ctrl_name = '')
	{
		return self::_exec($action_name, FALSE, $ctrl_name);
	}
}
?>