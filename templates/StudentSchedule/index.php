<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSchedule[]|\Cake\Collection\CollectionInterface $studentSchedule
 */
?>
<div class="studentSchedule index content">
    <?= $this->Html->link(__('New Student Schedule'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Student Schedule') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('schedule_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentSchedule as $studentSchedule): ?>
                <tr>
                    <td><?= $this->Number->format($studentSchedule->id) ?></td>
                    <td><?= $studentSchedule->has('schedule') ? $this->Html->link($studentSchedule->schedule->id, ['controller' => 'Schedule', 'action' => 'view', $studentSchedule->schedule->id]) : '' ?></td>
                    <td><?= $studentSchedule->has('student') ? $this->Html->link($studentSchedule->student->id, ['controller' => 'Students', 'action' => 'view', $studentSchedule->student->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $studentSchedule->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentSchedule->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSchedule->id)]) ?>
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
