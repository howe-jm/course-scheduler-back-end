<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSchedule $studentSchedule
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student Schedule'), ['action' => 'edit', $studentSchedule->schedule_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student Schedule'), ['action' => 'delete', $studentSchedule->schedule_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSchedule->schedule_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Student Schedule'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student Schedule'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studentSchedule view content">
            <h3><?= h($studentSchedule->schedule_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Schedule') ?></th>
                    <td><?= $studentSchedule->has('schedule') ? $this->Html->link($studentSchedule->schedule->id, ['controller' => 'Schedule', 'action' => 'view', $studentSchedule->schedule->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $studentSchedule->has('student') ? $this->Html->link($studentSchedule->student->id, ['controller' => 'Students', 'action' => 'view', $studentSchedule->student->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
