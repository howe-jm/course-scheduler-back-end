<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentScheduleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentScheduleTable Test Case
 */
class StudentScheduleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentScheduleTable
     */
    protected $StudentSchedule;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StudentSchedule',
        'app.Schedule',
        'app.Students',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StudentSchedule') ? [] : ['className' => StudentScheduleTable::class];
        $this->StudentSchedule = $this->getTableLocator()->get('StudentSchedule', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StudentSchedule);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
