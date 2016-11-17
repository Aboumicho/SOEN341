<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KlassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KlassesTable Test Case
 */
class KlassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KlassesTable
     */
    public $Klasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.klasses',
        'app.courses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Klasses') ? [] : ['className' => 'App\Model\Table\KlassesTable'];
        $this->Klasses = TableRegistry::get('Klasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Klasses);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
