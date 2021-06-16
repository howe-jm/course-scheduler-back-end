<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule[]|\Cake\Collection\CollectionInterface $schedule->has()
 */
?>
<div class="schedule index content">
    <?= $this->Html->link(__('New Schedule'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Schedule') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('monday') ?></th>
                    <th><?= $this->Paginator->sort('tuesday') ?></th>
                    <th><?= $this->Paginator->sort('wednesday') ?></th>
                    <th><?= $this->Paginator->sort('thursday') ?></th>
                    <th><?= $this->Paginator->sort('friday') ?></th>
                    <th><?= $this->Paginator->sort('professor_id') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('semester') ?></th>
                    <th><?= $this->Paginator->sort('start_time') ?></th>
                    <th><?= $this->Paginator->sort('end_time') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedule as $schedule) : ?>
                    <tr>
                        <td><?= $this->Number->format($schedule->id) ?></td>
                        <td><?= $schedule->has('course') ? $this->Html->link($schedule->course->subject, ['controller' => 'Courses', 'action' => 'view', $schedule->course->id]) : '' ?></td>
                        <td><?= h($schedule->monday) ?></td>
                        <td><?= h($schedule->tuesday) ?></td>
                        <td><?= h($schedule->wednesday) ?></td>
                        <td><?= h($schedule->thursday) ?></td>
                        <td><?= h($schedule->friday) ?></td>
                        <td><?= $schedule->has('professor') ? $this->Html->link($schedule->professor->last_name, ['controller' => 'Professors', 'action' => 'view', $schedule->professor->id]) : '' ?></td>
                        <td><?= $this->Number->format($schedule->year) ?></td>
                        <td><?= h($schedule->semester) ?></td>
                        <td><?= h($schedule->start_time) ?></td>
                        <td><?= h($schedule->end_time) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $schedule->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?>
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