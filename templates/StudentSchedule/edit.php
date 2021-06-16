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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studentSchedule->schedule_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studentSchedule->schedule_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Student Schedule'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studentSchedule form content">
            <?= $this->Form->create($studentSchedule) ?>
            <fieldset>
                <legend><?= __('Edit Student Schedule') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
