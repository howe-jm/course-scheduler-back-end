<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Schedule'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Schedule'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="schedule view content">
            <h3><?= h($schedule->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $schedule->has('course') ? $this->Html->link($schedule->course->id, ['controller' => 'Courses', 'action' => 'view', $schedule->course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Professor') ?></th>
                    <td><?= $schedule->has('professor') ? $this->Html->link($schedule->professor->id, ['controller' => 'Professors', 'action' => 'view', $schedule->professor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($schedule->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($schedule->end_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($schedule->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $this->Number->format($schedule->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monday') ?></th>
                    <td><?= $schedule->monday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Tuesday') ?></th>
                    <td><?= $schedule->tuesday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Wednesday') ?></th>
                    <td><?= $schedule->wednesday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Thursday') ?></th>
                    <td><?= $schedule->thursday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Friday') ?></th>
                    <td><?= $schedule->friday ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Semester') ?></th>
                    <td><?= $schedule->semester ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Student Schedule') ?></h4>
                <?php if (!empty($schedule->student_schedule)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Schedule Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($schedule->student_schedule as $studentSchedule) : ?>
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
