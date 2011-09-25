<?php
final class CZCviewConvert extends CZBase
{
	/**
	 * @param mixed   $value
	 * @param boolean $escape_flag
	 * 
	 * @return mixed
	 * 
	 * @author Shin Uesugi
	 */
	private function _exec($value, $escape_flag, $mobile_flag)
	{
		if (is_array($value)) {
			foreach ($value as $key => $val) {
				$value[$key] = self::exec($val, $escape_flag);
			}
		} else if (is_string($value)) {
			if ($escape_flag) {
				$value = htmlspecialchars($value);
				$value = str_replace(array("\r\n", "\r", "\n"), '<br />', $value);
			}
			if ($mobile_flag) {
				$value = mb_convert_kana($value, 'ask');
			}
		}
		
		return $value;
	}
	
	/**
	 * @param mixed   $value
	 * @param boolean $escape_flag
	 * 
	 * @return mixed
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($value, $escape_flag = TRUE)
	{
		$mobile_flag = $this->_cz->newCore('mobile', 'is_mobile')->exec();
		
		return self::_exec($value, $escape_flag, $mobile_flag);
	}
}
?>