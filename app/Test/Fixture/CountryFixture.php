<?php
/**
 * Country Fixture
 */
class CountryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'name' => 'Afghanistan'
		),
		array(
			'id' => '2',
			'name' => 'Afrique du Sud'
		),
		array(
			'id' => '3',
			'name' => 'Albanie'
		),
		array(
			'id' => '4',
			'name' => 'Algérie'
		),
		array(
			'id' => '5',
			'name' => 'Allemagne'
		),
		array(
			'id' => '6',
			'name' => 'Andorre'
		),
		array(
			'id' => '7',
			'name' => 'Angola'
		),
		array(
			'id' => '8',
			'name' => 'Antigua et Barbuda'
		),
		array(
			'id' => '9',
			'name' => 'Arabie saoudite'
		),
		array(
			'id' => '10',
			'name' => 'Argentine'
		),
	);

}
