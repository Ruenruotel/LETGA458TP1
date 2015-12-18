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
        'app.missionary',
        'app.subreligion',
        'app.religion',
        'app.country',
        'app.churches_missionary',
        'app.donation'
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

    /**
     * testIsOwnedBy method
     *
     * @return void
     */
    public function testIsOwnedByWithBadData() {
        $result = $this->Church->isOwnedBy(-1, -1);
        $this->assertFalse($result);
    }
    
    public function testIsOwnedByWithGoodData() {
        $result = $this->Church->isOwnedBy(1, 2);
        $this->assertTrue($result);
    }

}
