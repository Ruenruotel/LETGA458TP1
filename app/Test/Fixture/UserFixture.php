<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'role' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'modified' => array('type' => 'date', 'null' => false, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'username' => 'member',
			'password' => '$2a$10$8vzYEbg1/k1FsfzrH6926ukBpUhycnSLGqEPWrZHdECmY9TRbS9Ty',
			'role' => 'member',
			'created' => '2015-09-25',
			'modified' => '2015-11-12',
			'active' => 0,
			'email' => 'gaelletourneur2@hotmail.com'
		),
		array(
			'id' => '2',
			'username' => 'admin',
			'password' => '$2a$10$RX1opzoTJWt7tXoxu3Yo4OlhwMQtrXszNTiaqMxS7sIsB/BihYKHm',
			'role' => 'admin',
			'created' => '2015-09-25',
			'modified' => '2015-10-01',
			'active' => 1,
			'email' => ''
		),
		array(
			'id' => '16',
			'username' => 'Gael',
			'password' => '$2a$10$V3P.uln0S/bHwdWakLleqec752p1NsQdq/grdTWfRmlBZB89RTCui',
			'role' => 'member',
			'created' => '2015-11-12',
			'modified' => '2015-11-12',
			'active' => 0,
			'email' => 'gaelletourneur2@hotmail.com'
		),
	);

}
