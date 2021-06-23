<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('course_records')
            ->addColumn('student_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('course_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('school_year', 'smallinteger', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('semester', 'tinyinteger', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('completed', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('grade', 'smallinteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'student_id',
                ]
            )
            ->addIndex(
                [
                    'course_id',
                ]
            )
            ->create();

        $this->table('courses')
            ->addColumn('subject', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->addColumn('credit_value', 'tinyinteger', [
                'default' => '1',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('course_code', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->create();

        $this->table('professors')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->create();

        $this->table('schedule')
            ->addColumn('course_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('monday', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('tuesday', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('wednesday', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('thursday', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('friday', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('professor_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('year', 'smallinteger', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('semester', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('start_time', 'string', [
                'default' => null,
                'limit' => 12,
                'null' => false,
            ])
            ->addColumn('end_time', 'string', [
                'default' => null,
                'limit' => 12,
                'null' => false,
            ])
            ->addIndex(
                [
                    'course_id',
                ]
            )
            ->addIndex(
                [
                    'professor_id',
                ]
            )
            ->create();

        $this->table('student_schedule')
            ->addColumn('schedule_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('student_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'schedule_id',
                ]
            )
            ->addIndex(
                [
                    'student_id',
                ]
            )
            ->create();

        $this->table('students')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('major', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('required_credits', 'tinyinteger', [
                'default' => '120',
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('course_records')
            ->addForeignKey(
                'student_id',
                'students',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->addForeignKey(
                'course_id',
                'courses',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('schedule')
            ->addForeignKey(
                'course_id',
                'courses',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'professor_id',
                'professors',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();

        $this->table('student_schedule')
            ->addForeignKey(
                'schedule_id',
                'schedule',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->addForeignKey(
                'student_id',
                'students',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('course_records')
            ->dropForeignKey(
                'student_id'
            )
            ->dropForeignKey(
                'course_id'
            )->save();

        $this->table('schedule')
            ->dropForeignKey(
                'course_id'
            )
            ->dropForeignKey(
                'professor_id'
            )->save();

        $this->table('student_schedule')
            ->dropForeignKey(
                'schedule_id'
            )
            ->dropForeignKey(
                'student_id'
            )->save();

        $this->table('course_records')->drop()->save();
        $this->table('courses')->drop()->save();
        $this->table('professors')->drop()->save();
        $this->table('schedule')->drop()->save();
        $this->table('student_schedule')->drop()->save();
        $this->table('students')->drop()->save();
    }
}
