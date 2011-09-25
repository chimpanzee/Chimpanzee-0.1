<?php
final class CZCforwardCheckPrevActions extends CZBase
{
	/**
	 * @param array $actions
	 * 
	 * @author Shin Uesugi
	 */
	public function _exec($actions)
	{
		$current_ctrl_name         = $this->_cz->loadStatic('forward')->getCtrlName();
		$current_action_group_name = $this->_cz->loadStatic('forward')->getActionGroupName();
		$current_action_name       = $this->_cz->loadStatic('forward')->getActionName();
		
		$prev_ctrl_name         = $this->_cz->loadStatic('forward')->getPrevCtrlName();
		$prev_action_group_name = $this->_cz->loadStatic('forward')->getPrevActionGroupName();
		$prev_action_name       = $this->_cz->loadStatic('forward')->getPrevActionName();

		if (($current_ctrl_name == $prev_ctrl_name) && ($current_action_group_name == $prev_action_group_name) && ($current_action_name == $prev_action_name)) {
			return;
		}
		
		$hit_flag = FALSE;
		foreach ($actions as $action) {
			$values = array_values($action);

			$action_name = $values[0];
			if (isset($values[1])) {
				$action_group_name = $values[1];
			} else {
				$action_group_name = $current_action_group_name;
			}
			if (isset($values[2])) {
				$ctrl_name = $values[2];
			} else {
				$ctrl_name = $current_ctrl_name;
			}
			
			if (($ctrl_name === $prev_ctrl_name) && ($action_group_name === $prev_action_group_name) && ($action_name === $prev_action_name)) {
				$hit_flag = TRUE;
				break;
			}
		}
		
		if (!$hit_flag) {
			$this->_cz->newCore('forward', '403')->exec();
		}
	}

	/**
	 * @param array $actions
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($actions)
	{
		$current_ctrl_name   = $this->_cz->loadStatic('forward')->getCtrlName();
		$current_action_name = $this->_cz->loadStatic('forward')->getActionName();
		
		$prev_ctrl_name   = $this->_cz->loadStatic('forward')->getPrevCtrlName();
		$prev_action_name = $this->_cz->loadStatic('forward')->getPrevActionName();
		
		if (($current_ctrl_name == $prev_ctrl_name) && ($current_action_name == $prev_action_name)) {
			return;
		}
		
		$hit_flag = FALSE;
		foreach ($actions as $action) {
			$values = array_values($action);

			$action_name = $values[0];
			if (isset($values[1])) {
				$ctrl_name = $values[1];
			} else {
				$ctrl_name = $current_ctrl_name;
			}
			
			if (($ctrl_name === $prev_ctrl_name) && ($action_name === $prev_action_name)) {
				$hit_flag = TRUE;
				break;
			}
		}
		
		if (!$hit_flag) {
			$this->_cz->newCore('forward', '403')->exec();
		}
	}
}
?>