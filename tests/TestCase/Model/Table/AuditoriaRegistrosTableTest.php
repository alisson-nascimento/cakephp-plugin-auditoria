<?php
namespace Auditoria\Test\TestCase\Model\Table;

use Auditoria\Model\Table\AuditoriaRegistrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Auditoria\Model\Table\AuditoriaRegistrosTable Test Case
 */
class AuditoriaRegistrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Auditoria\Model\Table\AuditoriaRegistrosTable
     */
    public $AuditoriaRegistros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.auditoria.auditoria_registros',
        'plugin.auditoria.auditoria_logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AuditoriaRegistros') ? [] : ['className' => AuditoriaRegistrosTable::class];
        $this->AuditoriaRegistros = TableRegistry::getTableLocator()->get('AuditoriaRegistros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuditoriaRegistros);

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
