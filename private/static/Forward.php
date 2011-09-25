<?php
final class CZSForward extends CZBase
{
	// Object
	private $_ctrl = NULL;
	
	private $_ctrl_name         = '';
	private $_action_group_name = '';
	private $_action_name       = '';
	
	private $_prev_ctrl_name         = '';
	private $_prev_action_group_name = '';
	private $_prev_action_name       = '';
	

	/**
	 * @param string $action_name
	 * @param string $action_group_name / NULL
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	public function _exec($action_name, $action_group_name = '', $ctrl_name = '')
	{
		$routing_params = $this->_cz->newCore('routing', 'get_params')->exec();
		list($this->_ctrl, $method_name) = $this->_cz->newCore('forward', '_forward')->exec($action_name, $action_group_name, $ctrl_name, $routing_params);
		if (call_user_func_array(array($this->_ctrl, $method_name), $routing_params) === NULL) {
			$this->_cz->newCore('view', 'display')->exec();
		}
		exit;
	}
	
	/**
	 * @param string $action_name
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($action_name, $ctrl_name = '')
	{
		self::_exec($action_name, NULL, $ctrl_name);
	}
	
	
	/*
	 * #Set property
	 */

	/**
	 * @param string $name
	 * 
	 * @author Shin Uesugi
	 */
	public function setCtrlName($name)
	{
		$this->_ctrl_name = $name;
	}
	
	/**
	 * @param string $name
	 * 
	 * @author Shin Uesugi
	 */
	public function setActionGroupName($name)
	{
		$this->_action_group_name = $name;
	}

	/**
	 * @param string $name
	 * 
	 * @author Shin Uesugi
	 */
	public function setActionName($name)
	{
		$this->_action_name = $name;
	}

	/**
	 * @param string $name
	 * 
	 * @author Shin Uesugi
	 */
	public function setPrevCtrlName($name)
	{
		$this->_prev_ctrl_name = $name;
	}
	
	/**
	 * @param string $name
	 * 
	 * @author Shin Uesugi
	 */
	public function setPrevActionGroupName($name)
	{
		$this->_prev_action_group_name = $name;
	}

	/**
	 * @param string $name
	 * 
	 * @author Shin Uesugi
	 */
	public function setPrevActionName($name)
	{
		$this->_prev_action_name = $name;
	}
	
	
	/*
	 * #Get property
	 */
	
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getCtrlName()
	{
		return $this->_ctrl_name;
	}
	
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getActionGroupName()
	{
		return $this->_action_group_name;
	}
	
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getActionName()
	{
		return $this->_action_name;
	}
	
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getPrevCtrlName()
	{
		return $this->_prev_ctrl_name;
	}
	
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getPrevActionGroupName()
	{
		return $this->_prev_action_group_name;
	}
	
	/**
	 * @return string
	 * 
	 * @author Shin Uesugi
	 */
	public function getPrevActionName()
	{
		return $this->_prev_action_name;
	}
}
?>