<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property int $course_id
 * @property bool $monday
 * @property bool $tuesday
 * @property bool $wednesday
 * @property bool $thursday
 * @property bool $friday
 * @property int|null $professor_id
 * @property int $year
 * @property bool $semester
 * @property string $start_time
 * @property string $end_time
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\Professor $professor
 * @property \App\Model\Entity\StudentSchedule[] $student_schedule
 */
class Schedule extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'course_id' => true,
        'monday' => true,
        'tuesday' => true,
        'wednesday' => true,
        'thursday' => true,
        'friday' => true,
        'professor_id' => true,
        'year' => true,
        'semester' => true,
        'start_time' => true,
        'end_time' => true,
        'course' => true,
        'professor' => true,
        'student_schedule' => true,
    ];
}
