<?php

App::uses('Subreligion', 'Model');

/**
 * Subreligion Test Case
 */
class SubreligionTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.subreligion',
        'app.religion',
        'app.missionary',
        'app.user',
        'app.church',
        'app.donation',
        'app.churches_missionary',
        'app.country'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Subreligion = ClassRegistry::init('Subreligion');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Subreligion);

        parent::tearDown();
    }

    public function testGetByReligionGood() {

        $result = $this->Subreligion->getByReligion(1);
        $expected = array(
            (int) 1 => 'Sionisme religieux',
            (int) 2 => 'Hassidisme'
        );
        $this->assertEquals($expected, $result);
    }
    
    public function testGetByReligionBad() {

        $result = $this->Subreligion->getByReligion(-1);
        $this->assertEquals(array(), $result);
    }

}
