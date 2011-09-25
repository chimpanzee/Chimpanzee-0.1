<?php
require_once 'Func.php';
class CZCtrl extends CZFunc
{
	/*
	 * #Forward
	 */
	
	/**
	 * @param string $action_name
	 * @param string $action_group_name
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	protected function _forward($action_name, $action_group_name = '', $ctrl_name = '')
	{
		$this->_cz->loadStatic('forward')->_exec($action_name, $action_group_name, $ctrl_name);
	}
	
	/**
	 * @param string $action_name
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	protected function forward($action_name, $ctrl_name = '')
	{
		$this->_cz->loadStatic('forward')->exec($action_name, $ctrl_name);
	}
	
	/**
	 * @author Shin Uesugi
	 */
	protected function forward403()
	{
		$this->_cz->newCore('forward', '403')->exec();
	}
	
	/**
	 * @author Shin Uesugi
	 */
	protected function forward404()
	{
		$this->_cz->newCore('forward', '404')->exec();
	}
	
	
	/*
	 * #Redirect
	 */
	
	/**
	 * @param string $action_name
	 * @param string $action_group_name
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	protected function _redirect($action_name, $action_group_name = '', $ctrl_name = '')
	{
		$this->_cz->newCore('redirect', 'action')->_exec($action_name, $action_group_name, $ctrl_name);
	}
	
	/**
	 * @param string $action_name
	 * @param string $ctrl_name
	 * 
	 * @author Shin Uesugi
	 */
	protected function redirect($action_name, $ctrl_name = '')
	{
		$this->_cz->newCore('redirect', 'action')->exec($action_name, $ctrl_name);
	}
	
	/**
	 * @author Shin Uesugi
	 */
	protected function redirectRoot()
	{
		$this->_cz->newCore('redirect', 'root')->exec();
	}
	
	/**
	 * @author Shin Uesugi
	 */
	protected function redirectReturn()
	{
		$this->_cz->newCore('redirect', 'return')->exec();
	}
	
	/**
	 * @param string $url
	 * 
	 * @author Shin Uesugi
	 */
	protected function redirect301($url)
	{
		$this->_cz->newCore('redirect', '301')->exec($url);
	}
	
	/**
	 * @param string $url
	 * 
	 * @author Shin Uesugi
	 */
	protected function redirect302($url)
	{
		$this->_cz->newCore('redirect', '302')->exec($url);
	}
	
	
	/*
	 * #Check previous action
	 */
	
	/**
	 * @param array $actions
	 * 
	 * @author Shin Uesugi
	 */
	protected function _checkPrevActions($actions)
	{
		$this->_cz->newCore('forward', 'check_prev_actions')->_exec($actions);
	}
	
	/**
	 * @param array $actions
	 * 
	 * @author Shin Uesugi
	 */
	protected function checkPrevActions($actions)
	{
		$this->_cz->newCore('forward', 'check_prev_actions')->exec($actions);
	}
	
	
	/*
	 * #View
	 */
	
	/**
	 * @param string  $var_name
	 * @param mixed   $value
	 * @param boolean $escape_flag
	 * 
	 * @author Shin Uesugi
	 */
	protected function addViewVar($var_name, $value, $escape_flag = TRUE)
	{
		$this->_cz->newCore('view', 'add_var')->exec($var_name, $value, $escape_flag);
	}
	
	/**
	 * @param string $file
	 * 
	 * @author Shin Uesugi
	 */
	protected function display($file = '')
	{
		$this->_cz->newCore('view', 'display')->exec($file);
	}
}
?>