<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentScheduleFixture
 */
class StudentScheduleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'student_schedule';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'schedule_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'student_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'student_key' => ['type' => 'index', 'columns' => ['student_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['schedule_id', 'student_id'], 'length' => []],
            'student_schedule_ibfk_1' => ['type' => 'foreign', 'columns' => ['schedule_id'], 'references' => ['schedule', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'student_schedule_ibfk_2' => ['type' => 'foreign', 'columns' => ['student_id'], 'references' => ['students', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'schedule_id' => 1,
                'student_id' => 1,
            ],
        ];
        parent::init();
    }
}
