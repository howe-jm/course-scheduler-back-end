<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Professor'), ['action' => 'edit', $professor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Professor'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Professors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Professor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="professors view content">
            <h3><?= h($professor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($professor->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($professor->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($professor->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Schedule') ?></h4>
                <?php if (!empty($professor->schedule)) : ?>
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
                        <?php foreach ($professor->schedule as $schedule) : ?>
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
