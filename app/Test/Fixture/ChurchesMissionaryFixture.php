<?php
/**
 * ChurchesMissionary Fixture
 */
class ChurchesMissionaryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'church_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'missionary_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'id' => '2',
			'church_id' => '3',
			'missionary_id' => '1'
		),
		array(
			'id' => '3',
			'church_id' => '3',
			'missionary_id' => '2'
		),
		array(
			'id' => '6',
			'church_id' => '1',
			'missionary_id' => '2'
		),
		array(
			'id' => '8',
			'church_id' => '3',
			'missionary_id' => '4'
		),
		array(
			'id' => '9',
			'church_id' => '1',
			'missionary_id' => '6'
		),
		array(
			'id' => '10',
			'church_id' => '3',
			'missionary_id' => '6'
		),
	);

}
