<?php
final class CZCurlGetSelf extends CZBase
{
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function exec()
	{
		$ctrl_name         = $this->_cz->newCore('forward', 'get_ctrl_name')->exec();
		$action_group_name = $this->_cz->newCore('forward', 'get_action_group_name')->exec();
		$action_name       = $this->_cz->newCore('forward', 'get_action_name')->exec();
		
		$url  = $this->_cz->newCore('url', 'get_root')->exec();
		$url .= '/' . $ctrl_name;
		if ($this->_cz->isValidStr($action_group_name)) {
			$url .= '/' . $action_group_name;
		}
		if ($action_name != 'index') {
			$url .= '/' . $action_name;
		}
		if ($routing_params = $this->_cz->newCore('routing', 'get_params')->exec()) {
			foreach ($routing_params as $param) {
				$url .= '/' . $param;
			}
		}
		
		return $url;
	}
}
?>