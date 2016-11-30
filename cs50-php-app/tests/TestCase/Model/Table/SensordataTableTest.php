<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SensordataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SensordataTable Test Case
 */
class SensordataTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SensordataTable
     */
    public $Sensordata;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sensordata'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sensordata') ? [] : ['className' => 'App\Model\Table\SensordataTable'];
        $this->Sensordata = TableRegistry::get('Sensordata', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sensordata);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
