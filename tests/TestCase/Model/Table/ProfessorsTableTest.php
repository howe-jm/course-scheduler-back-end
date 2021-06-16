<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessorsTable Test Case
 */
class ProfessorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfessorsTable
     */
    protected $Professors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Professors',
        'app.Schedule',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Professors') ? [] : ['className' => ProfessorsTable::class];
        $this->Professors = $this->getTableLocator()->get('Professors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Professors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
