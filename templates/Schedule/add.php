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
            <?= $this->Html->link(__('List Schedule'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="schedule form content">
            <?= $this->Form->create($schedule) ?>
            <fieldset>
                <legend><?= __('Add Schedule') ?></legend>
                <?php
                echo $this->Form->control('course_id', ['options' => $courses]);
                echo $this->Form->control('monday');
                echo $this->Form->control('tuesday');
                echo $this->Form->control('wednesday');
                echo $this->Form->control('thursday');
                echo $this->Form->control('friday');
                echo $this->Form->control('professor_id', ['options' => $professors, 'empty' => true]);
                echo $this->Form->control('year', ['default' => 2021, 'label' => 'Year and Semester']);
                echo $this->Form->select('semester', [0 => 'Fall', 1 => 'Spring'], ['default' => 0]);
                echo $this->Form->label('start_time', 'Start Time');
                echo $this->Form->time('start_time', ['default' => '09:00:00']);
                echo $this->Form->label('end_time', 'End Time');
                echo $this->Form->time('end_time', ['default' => '11:00:00']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>