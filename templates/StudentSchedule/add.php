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
            <?= $this->Html->link(__('List Student Schedule'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studentSchedule form content">
            <?= $this->Form->create($studentSchedule) ?>
            <fieldset>
                <legend><?= __('Add Student Schedule') ?></legend>
                <?php
                    echo $this->Form->control('schedule_id', ['options' => $schedule]);
                    echo $this->Form->control('student_id', ['options' => $students]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
