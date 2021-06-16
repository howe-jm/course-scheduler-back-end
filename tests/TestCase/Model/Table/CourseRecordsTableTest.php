<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseRecordsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseRecordsTable Test Case
 */
class CourseRecordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseRecordsTable
     */
    protected $CourseRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CourseRecords',
        'app.Students',
        'app.Courses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CourseRecords') ? [] : ['className' => CourseRecordsTable::class];
        $this->CourseRecords = $this->getTableLocator()->get('CourseRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CourseRecords);

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
