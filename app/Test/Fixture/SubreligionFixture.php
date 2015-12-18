<?php
/**
 * Subreligion Fixture
 */
class SubreligionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'religion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'name' => 'Sionisme religieux',
			'religion_id' => '1'
		),
		array(
			'id' => '2',
			'name' => 'Hassidisme',
			'religion_id' => '1'
		),
		array(
			'id' => '3',
			'name' => 'Catholicisme',
			'religion_id' => '2'
		),
		array(
			'id' => '4',
			'name' => 'Orthodoxie',
			'religion_id' => '2'
		),
		array(
			'id' => '5',
			'name' => 'Protestantisme',
			'religion_id' => '2'
		),
		array(
			'id' => '6',
			'name' => 'Anglicanisme',
			'religion_id' => '2'
		),
		array(
			'id' => '7',
			'name' => 'Méthodisme',
			'religion_id' => '2'
		),
		array(
			'id' => '8',
			'name' => 'Évangélisme',
			'religion_id' => '2'
		),
		array(
			'id' => '9',
			'name' => 'Luthéranisme',
			'religion_id' => '2'
		),
		array(
			'id' => '10',
			'name' => 'Chiisme',
			'religion_id' => '3'
		),
	);

}
