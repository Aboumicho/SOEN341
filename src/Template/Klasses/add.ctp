<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Klasses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="klasses form large-9 medium-8 columns content">
    <?= $this->Form->create($klass) ?>
    <fieldset>
        <legend><?= __('Add Klass') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('day');
            echo $this->Form->input('type');
            echo $this->Form->input('start');
            echo $this->Form->input('end');
            echo $this->Form->input('code');
            echo $this->Form->input('course_id', ['options' => $courses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
