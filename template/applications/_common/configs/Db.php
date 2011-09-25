<?php
final class configDb extends CZConfig
{
	public function _construct()
	{
		$this->setValues(array(
			'servers' => array(
				'main' => array(
					'dsn'  => 'mysql:dbname=main_dbname;host=localhost',
					'user' => 'main_user',
					'pass' => 'main_pass',
				),
				'sub' => array(
					array(
						'dsn'  => 'mysql:dbname=sub_dbname1;host=localhost',
						'user' => 'sub_user1',
						'pass' => 'sub_pass1',
					),
					array(
						'dsn'  => 'mysql:dbname=sub_dbname2;host=localhost',
						'user' => 'sub_user2',
						'pass' => 'sub_pass2',
					),
				),
			),
			
			'persistent_flag' => TRUE,
			
			'table_name_prefix' => '',
		));
	}
}
?>