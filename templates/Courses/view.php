<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Course'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="courses view content">
            <h3><?= h($course->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= h($course->subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Course Code') ?></th>
                    <td><?= h($course->course_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($course->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Credit Value') ?></th>
                    <td><?= $this->Number->format($course->credit_value) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Course Records') ?></h4>
                <?php if (!empty($course->course_records)) : ?>
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
                        <?php foreach ($course->course_records as $courseRecords) : ?>
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
                <h4><?= __('Related Schedule') ?></h4>
                <?php if (!empty($course->schedule)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('Monday') ?></th>
                            <th><?= __('Tuesday') ?></th>
                            <th><?= __('Wednesday') ?></th>
                            <th><?= __('Thursday') ?></th>
                            <th><?= __('Friday') ?></th>
                            <th><?= __('Professor Id') ?></th>
                            <th><?= __('Year') ?></th>
                            <th><?= __('Semester') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($course->schedule as $schedule) : ?>
                        <tr>
                            <td><?= h($schedule->id) ?></td>
                            <td><?= h($schedule->course_id) ?></td>
                            <td><?= h($schedule->monday) ?></td>
                            <td><?= h($schedule->tuesday) ?></td>
                            <td><?= h($schedule->wednesday) ?></td>
                            <td><?= h($schedule->thursday) ?></td>
                            <td><?= h($schedule->friday) ?></td>
                            <td><?= h($schedule->professor_id) ?></td>
                            <td><?= h($schedule->year) ?></td>
                            <td><?= h($schedule->semester) ?></td>
                            <td><?= h($schedule->start_time) ?></td>
                            <td><?= h($schedule->end_time) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Schedule', 'action' => 'view', $schedule->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Schedule', 'action' => 'edit', $schedule->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schedule', 'action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?>
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
