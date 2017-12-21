<?php defined('SYSPATH') OR die('No direct access allowed.');
$config['default'] = array
(
	'benchmark'     => TRUE,
	'persistent'    => FALSE,
	'connection'    => array
	(
		'type'     => 'mysqli',
		'user'     => 'root', /* ชื่อผู้ใช้ในการเข้าฐานข้อมูล */
		'pass'     => '', /* รหัสผ่านในการเข้าฐานข้อมูล */
		'host'     => 'localhost', /* ชื่อโฮสของฐานข้อมูล */
		'port'     => FALSE,
		'socket'   => FALSE,
		'database' => 'db_repair' /* ชื่อของฐานข้อมูล */
	),
	'character_set' => 'utf8',
	'table_prefix'  => '',
	'object'        => TRUE,
	'cache'         => FALSE,
	'escape'        => TRUE
);
