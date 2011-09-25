<?php
final class CZCforward_Forward extends CZBase
{
	/**
	 * @param string $action_name
	 * @param string $action_group_name / NULL
	 * @param string $ctrl_name
	 * @param array  $routing_params
	 * 
	 * @return array
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($action_name, $action_group_name, $ctrl_name, $routing_params)
	{
		$this->_cz->unloadAll();
		
		if ($this->_cz->isValidStr($ctrl_name)) {
			$now_ctrl_name = $ctrl_name;
			$this->_cz->loadStatic('forward')->setCtrlName($now_ctrl_name);
		} else {
			$now_ctrl_name = $this->_cz->loadStatic('forward')->getCtrlName();
		}

		if ($this->_cz->isValidStr($action_group_name)) {
			$now_action_group_name = $action_group_name;
			$this->_cz->loadStatic('forward')->setActionGroupName($now_action_group_name);
		} else if ($action_group_name === NULL) {
			$now_action_group_name = $action_group_name;
			$this->_cz->loadStatic('forward')->setActionGroupName($now_action_group_name);
		} else {
			$now_action_group_name = $this->_cz->loadStatic('forward')->getActionGroupName();
		}
		
		$now_action_name = $action_name;
		$this->_cz->loadStatic('forward')->setActionName($now_action_name);
		
		if (!($ctrl = $this->_cz->newUser('ctrl', $now_ctrl_name))) {
			$this->_cz->newCore('forward', '404')->exec();
		}
		
		$action_method_name  = $now_action_group_name ? $now_action_group_name : 'action';
		$action_method_name .= $this->_cz->getUpperStr($now_action_name);
		
		if (!method_exists($ctrl, $action_method_name)) {
			$this->_cz->newCore('forward', '404')->exec();
		}

		if (($prev_ctrl_name = $this->_cz->newCore('ses', 'get')->exec('prev_ctrl_name', FALSE)) === FALSE) {
			$prev_ctrl_name = NULL;
		}
		if (($prev_action_group_name = $this->_cz->newCore('ses', 'get')->exec('prev_action_group_name', FALSE)) === FALSE) {
			$prev_action_group_name = NULL;
		}
		if (($prev_action_name = $this->_cz->newCore('ses', 'get')->exec('prev_action_name', FALSE)) === FALSE) {
			$prev_action_name = NULL;
		}
		
		$this->_cz->loadStatic('forward')->setPrevCtrlName($prev_ctrl_name);
		$this->_cz->loadStatic('forward')->setPrevActionGroupName($prev_action_group_name);
		$this->_cz->loadStatic('forward')->setPrevActionName($prev_action_name);
		
		if (method_exists($ctrl, '_common')) {
			$ctrl->_common();
		}
		if ($this->_cz->isValidStr($now_action_group_name)) {
			$method_name = $now_action_group_name . '_common';
			if (method_exists($ctrl, $method_name)) {
				$ctrl->$method_name();
			}
		}
		
		if (($now_ctrl_name != $prev_ctrl_name) || ($now_action_group_name != $prev_action_group_name)) {
			$this->_cz->newCore('url', 'set_return')->exec();
			
			if ($now_ctrl_name != $prev_ctrl_name) {
				$this->_cz->newCore('ses', 'set')->exec('prev_ctrl_name', $now_ctrl_name);
				if (method_exists($ctrl, '_init')) {
					call_user_func_array(array($ctrl, '_init'), $routing_params);
				}
			}

			if ($now_action_group_name != $prev_action_group_name) {
				$this->_cz->newCore('ses', 'set')->exec('prev_action_group_name', $now_action_group_name);
			}
			if ($this->_cz->isValidStr($now_action_group_name)) {
				$method_name = $now_action_group_name . '_init';
				if (method_exists($ctrl, $method_name)) {
					call_user_func_array(array($ctrl, $method_name), $routing_params);
				}
			}
		}
		$this->_cz->newCore('ses', 'set')->exec('prev_action_name', $now_action_name);
		
		return array($ctrl, $action_method_name);
	}
}
?>