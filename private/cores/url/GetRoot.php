<?php
final class CZCurlGetRoot extends CZBase
{
	/**
	 * @param boolean secure_flag <option>
	 * @param array   $params(
	 *   'routing' => array(
	 *     string Parameter value
	 *     ...
	 *   ) <option>
	 *   'get' => array(
	 *     string Parameter name => string Parameter value
	 *     ...
	 *   ) <option>
	 * ) <option>
	 * 
	 * @return string URL
	 * 
	 * @author Shin Uesugi
	 */
	public function exec($secure_flag = FALSE, $params = NULL)
	{
		$url  = $secure_flag ? 'https' : 'http';
		$url .= '://' . $_SERVER['SERVER_NAME'];
		$url .= $this->_cz->newCore('url', 'get_path')->exec();
		if (isset($params['routing'])) {
			foreach ($params['routing'] as $value) {
				$url .= '/' . $value;
			}
		}
		if (isset($params['get'])) {
			$get_sentence = '';
			foreach ($params['get'] as $name => $value) {
				if ($get_sentence) {
					$get_sentence .= '&';
				}
				$get_sentence .= $name . '=' . urlencode($value);
			}
			$url .= '?' . $get_sentence;
		}

		return $url;
	}
}
?>