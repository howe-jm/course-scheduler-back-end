<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScheduleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScheduleTable Test Case
 */
class ScheduleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ScheduleTable
     */
    protected $Schedule;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Schedule',
        'app.Courses',
        'app.Professors',
        'app.StudentSchedule',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Schedule') ? [] : ['className' => ScheduleTable::class];
        $this->Schedule = $this->getTableLocator()->get('Schedule', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Schedule);

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
