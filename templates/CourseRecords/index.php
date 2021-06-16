<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CourseRecord[]|\Cake\Collection\CollectionInterface $courseRecords
 */
?>
<div class="courseRecords index content">
    <?= $this->Html->link(__('New Course Record'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Course Records') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('school_year') ?></th>
                    <th><?= $this->Paginator->sort('semester') ?></th>
                    <th><?= $this->Paginator->sort('completed') ?></th>
                    <th><?= $this->Paginator->sort('grade') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courseRecords as $courseRecord): ?>
                <tr>
                    <td><?= $this->Number->format($courseRecord->id) ?></td>
                    <td><?= $courseRecord->has('student') ? $this->Html->link($courseRecord->student->id, ['controller' => 'Students', 'action' => 'view', $courseRecord->student->id]) : '' ?></td>
                    <td><?= $courseRecord->has('course') ? $this->Html->link($courseRecord->course->id, ['controller' => 'Courses', 'action' => 'view', $courseRecord->course->id]) : '' ?></td>
                    <td><?= $this->Number->format($courseRecord->school_year) ?></td>
                    <td><?= $this->Number->format($courseRecord->semester) ?></td>
                    <td><?= h($courseRecord->completed) ?></td>
                    <td><?= $this->Number->format($courseRecord->grade) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $courseRecord->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $courseRecord->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $courseRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseRecord->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
