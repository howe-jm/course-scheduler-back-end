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
            <?= $this->Html->link(__('List Course Records'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="courseRecords form content">
            <?= $this->Form->create($courseRecord) ?>
            <fieldset>
                <legend><?= __('Add Course Record') ?></legend>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('course_id', ['options' => $courses]);
                    echo $this->Form->control('school_year');
                    echo $this->Form->control('semester');
                    echo $this->Form->control('completed');
                    echo $this->Form->control('grade');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
