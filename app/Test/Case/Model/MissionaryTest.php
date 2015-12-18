<?php

App::uses('Missionary', 'Model');

/**
 * Missionary Test Case
 */
class MissionaryTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.missionary',
        'app.user',
        'app.church',
        'app.donation',
        'app.churches_missionary',
        'app.subreligion',
        'app.religion',
        'app.country'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Missionary = ClassRegistry::init('Missionary');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Missionary);

        parent::tearDown();
    }

    /**
     * testIsOwnedBy method
     *
     * @return void
     */
    public function testIsOwnedByWithBadData() {
        $result = $this->Missionary->isOwnedBy(-1, -1);
        $this->assertFalse($result);
    }

    public function testIsOwnedByWithGoodData() {
        $result = $this->Missionary->isOwnedBy(1, 2);
        $this->assertTrue($result);
    }

    public function testNoName() {
        $data = array(
            'Missionary' => array(
                'name' => '',
                'email' => 'test@test.test',
                'details' => 'test'
            )
        );
        $result = $this->Missionary->save($data);
        $this->assertFalse($result);
    }

    public function testAlphanumericId() {
        $data = array(
            'Missionary' => array(
                'name' => 'test',
                'email' => 'test@test.test',
                'details' => 'test',
                'subreligion_id' => 'test'
            )
        );
        $result = $this->Missionary->save($data);
        $this->assertFalse($result);
    }

    public function testInvalidEmail() {
        $data = array('Missionary' => array(
                'name' => 'test',
                'email' => 'test',
                'details' => 'test',
        ));
        $result = $this->Missionary->save($data);
        $this->assertFalse($result);
    }

    public function testAllValid() {
        $data = array('Missionary' => array(
                'name' => 'test',
                'email' => 'test@test.test',
                'details' => 'test',
                'user_id' => 1,
                'subreligion_id' => 1,
                'country_id' => 1
        ));
        $result = $this->Missionary->save($data);
        $this->assertArrayHasKey('Missionary', $result);
    }

    /**
     * testProcessImageUpload method
     *
     * @return void
     */
    public function testProcessImageUploadTrue() {
        $test = array('Missionary' => array(
                'name' => 'test',
                'email' => 'test@test.test',
                'details' => 'test',
                'user_id' => 1,
                'subreligion_id' => 1,
                'country_id' => 1,
                'profile_picture' => array(
                    'tmp_name' => 'TestFile.jpg'
                )
        ));
        $res = $this->Missionary->processImageUpload($test);
        $this->assertTrue($res);
    }

    public function testProcessImageUploadFalse() {

        $data = array(
            'Missionary' => array(
                'name' => 'test',
                'email' => 'test@test.test',
                'details' => 'test',
                'user_id' => 1,
                'subreligion_id' => 1,
                'country_id' => 1,
                'profile_picture' => array(
                    'tmp_name' => 'TestFile.bruh'
                )
            )
        );
        $result = $this->Missionary->save($data);
        $this->assertFalse($result);
    }

}
