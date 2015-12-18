<?php

App::uses('Country', 'Model');

/**
 * Country Test Case
 */
class CountryTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.country',
        'app.missionary',
        'app.user',
        'app.church',
        'app.donation',
        'app.churches_missionary',
        'app.subreligion',
        'app.religion'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Country = ClassRegistry::init('Country');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Country);

        parent::tearDown();
    }

    /**
     * testGetCountries method
     *
     * @return void
     */
    public function testGetCountriesWithNoLetter() {
        $result = $this->Country->getCountries('');
        $this->assertFalse($result);
    }
    
    public function testGetCountriesWithNull() {
        $result = $this->Country->getCountries(null);
        $this->assertFalse($result);
    }
    
    public function testGetCountriesWithOneLetter() {
        $result = $this->Country->getCountries('a');
        $this->assertNotNull($result[0]);
    }
    
    public function testGetCountriesWithShittyLetter() {
        $result = $this->Country->getCountries('w');
        $this->assertEquals(array(), $result);
    }
    
    public function testGetCountriesWithTwoLetters() {
        $result = $this->Country->getCountries('af');
        $this->assertNotNull($result[0]);
    }

    /**
     * testGetIdByName method
     *
     * @return void
     */
    public function testGetIdByNameWithNull() {
        $result = $this->Country->getIdByName(null);
        $this->assertEquals(-1, $result);
    }
    
    public function testGetIdByNameWithNoName() {
        $result = $this->Country->getIdByName('');
        $this->assertEquals(-1, $result);
    }
    
    public function testGetIdByNameWithBadName() {
        $result = $this->Country->getIdByName('Bruh');
        $this->assertEquals(-1, $result);
    }
    
    public function testGetIdByNameWithGoodName() {
        $result = $this->Country->getIdByName('Afghanistan');
        $this->assertEquals(1, $result);
    }

}
