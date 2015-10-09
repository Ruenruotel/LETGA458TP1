<?php
App::uses('Church', 'Model');

/**
 * Church Test Case
 */
class ChurchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.church',
		'app.user',
		'app.donation',
		'app.missionary'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Church = ClassRegistry::init('Church');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Church);

		parent::tearDown();
	}

}
