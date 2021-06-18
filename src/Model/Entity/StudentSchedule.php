<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentSchedule Entity
 *
 * @property int $id
 * @property int $schedule_id
 * @property int $student_id
 *
 * @property \App\Model\Entity\Schedule $schedule
 * @property \App\Model\Entity\Student $student
 */
class StudentSchedule extends Entity
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
        'schedule_id' => true,
        'student_id' => true,
        'schedule' => true,
        'student' => true,
    ];
}
