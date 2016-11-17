<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempsTable Test Case
 */
class TempsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempsTable
     */
    public $Temps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Temps') ? [] : ['className' => 'App\Model\Table\TempsTable'];
        $this->Temps = TableRegistry::get('Temps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Temps);

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
