<?php
/**
 * Religion Fixture
 */
class ReligionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'Judaïsme'
		),
		array(
			'id' => '2',
			'name' => 'Christianisme'
		),
		array(
			'id' => '3',
			'name' => 'Islam'
		),
		array(
			'id' => '4',
			'name' => 'Satanisme'
		),
		array(
			'id' => '5',
			'name' => 'Autres'
		),
	);

}
