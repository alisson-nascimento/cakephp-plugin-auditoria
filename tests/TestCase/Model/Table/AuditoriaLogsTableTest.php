<?php
namespace Auditoria\Test\TestCase\Model\Table;

use Auditoria\Model\Table\AuditoriaLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Auditoria\Model\Table\AuditoriaLogsTable Test Case
 */
class AuditoriaLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Auditoria\Model\Table\AuditoriaLogsTable
     */
    public $AuditoriaLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.auditoria.auditoria_logs',
        'plugin.auditoria.auditoria_registros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AuditoriaLogs') ? [] : ['className' => AuditoriaLogsTable::class];
        $this->AuditoriaLogs = TableRegistry::getTableLocator()->get('AuditoriaLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuditoriaLogs);

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
