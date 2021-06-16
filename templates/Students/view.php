<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="students view content">
            <h3><?= h($student->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($student->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($student->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Major') ?></th>
                    <td><?= h($student->major) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($student->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Required Credits') ?></th>
                    <td><?= $this->Number->format($student->required_credits) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Course Records') ?></h4>
                <?php if (!empty($student->course_records)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('School Year') ?></th>
                            <th><?= __('Semester') ?></th>
                            <th><?= __('Completed') ?></th>
                            <th><?= __('Grade') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->course_records as $courseRecords) : ?>
                        <tr>
                            <td><?= h($courseRecords->id) ?></td>
                            <td><?= h($courseRecords->student_id) ?></td>
                            <td><?= h($courseRecords->course_id) ?></td>
                            <td><?= h($courseRecords->school_year) ?></td>
                            <td><?= h($courseRecords->semester) ?></td>
                            <td><?= h($courseRecords->completed) ?></td>
                            <td><?= h($courseRecords->grade) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CourseRecords', 'action' => 'view', $courseRecords->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CourseRecords', 'action' => 'edit', $courseRecords->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CourseRecords', 'action' => 'delete', $courseRecords->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseRecords->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Student Schedule') ?></h4>
                <?php if (!empty($student->student_schedule)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Schedule Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->student_schedule as $studentSchedule) : ?>
                        <tr>
                            <td><?= h($studentSchedule->schedule_id) ?></td>
                            <td><?= h($studentSchedule->student_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentSchedule', 'action' => 'view', $studentSchedule->schedule_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentSchedule', 'action' => 'edit', $studentSchedule->schedule_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentSchedule', 'action' => 'delete', $studentSchedule->schedule_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSchedule->schedule_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
