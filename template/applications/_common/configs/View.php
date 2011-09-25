<?php
final class configView extends CZConfig
{
	public function _construct()
	{
		$this->setValues(array(
			'file_extension' => 'html',
		));
	}
}
?>