<?php
/**
 * Missionary Fixture
 */
class MissionaryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'details' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'profile_picture' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'subreligion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'country_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'name' => 'Bob the admin missionary',
			'details' => 'Details unknown.',
			'email' => 'bob@rekt.com',
			'profile_picture' => 'uploads/cool batman.png',
			'created' => '2015-09-25 21:26:19',
			'modified' => '2015-11-06 21:41:28',
			'user_id' => '2',
			'subreligion_id' => '1',
			'country_id' => '1'
		),
		array(
			'id' => '2',
			'name' => 'Albert the member missionary',
			'details' => 'A missionary.',
			'email' => 'albert@bruh.com',
			'profile_picture' => 'uploads/b99-terrysmile.jpg',
			'created' => '2015-10-06 04:01:11',
			'modified' => '2015-10-22 21:49:19',
			'user_id' => '1',
			'subreligion_id' => '1',
			'country_id' => '1'
		),
		array(
			'id' => '4',
			'name' => 'Matthew McConaughey  ',
			'details' => 'Alright alright alright!',
			'email' => 'alright@alright.alright',
			'profile_picture' => 'uploads/alright 3.png',
			'created' => '2015-10-22 21:24:48',
			'modified' => '2015-10-22 21:51:34',
			'user_id' => '1',
			'subreligion_id' => '1',
			'country_id' => '1'
		),
		array(
			'id' => '6',
			'name' => 'Florent Picard',
			'details' => 'FLORENT PICARRRRRRRRRRRRD',
			'email' => 'florent.picard@cmontmorency.qc.ca',
			'profile_picture' => 'uploads/florent.jpg',
			'created' => '2015-10-22 21:50:05',
			'modified' => '2015-10-22 21:50:05',
			'user_id' => '2',
			'subreligion_id' => '1',
			'country_id' => '1'
		),
		array(
			'id' => '10',
			'name' => 'Albert the member missionary',
			'details' => 'Alright alright alright !',
			'email' => 'shsh@SJ.DUDN',
			'profile_picture' => null,
			'created' => '2015-11-11 15:42:17',
			'modified' => '2015-11-11 16:07:42',
			'user_id' => '2',
			'subreligion_id' => '10',
			'country_id' => '64'
		),
	);

}
