<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $major
 * @property int $required_credits
 *
 * @property \App\Model\Entity\CourseRecord[] $course_records
 * @property \App\Model\Entity\StudentSchedule[] $student_schedule
 */
class Student extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'major' => true,
        'required_credits' => true,
        'course_records' => true,
        'student_schedule' => true,
    ];
}
