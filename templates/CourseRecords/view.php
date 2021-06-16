<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CourseRecord $courseRecord
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Course Record'), ['action' => 'edit', $courseRecord->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Course Record'), ['action' => 'delete', $courseRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseRecord->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Course Records'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Course Record'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="courseRecords view content">
            <h3><?= h($courseRecord->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $courseRecord->has('student') ? $this->Html->link($courseRecord->student->id, ['controller' => 'Students', 'action' => 'view', $courseRecord->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $courseRecord->has('course') ? $this->Html->link($courseRecord->course->id, ['controller' => 'Courses', 'action' => 'view', $courseRecord->course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($courseRecord->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('School Year') ?></th>
                    <td><?= $this->Number->format($courseRecord->school_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Semester') ?></th>
                    <td><?= $this->Number->format($courseRecord->semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Grade') ?></th>
                    <td><?= $this->Number->format($courseRecord->grade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Completed') ?></th>
                    <td><?= $courseRecord->completed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
