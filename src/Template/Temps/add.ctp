<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Temps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="temps form large-9 medium-8 columns content">
    <?= $this->Form->create($temp) ?>
    <fieldset>
        <legend><?= __('Add Temp') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('day');
            echo $this->Form->input('type');
            echo $this->Form->input('start');
            echo $this->Form->input('end');
            echo $this->Form->input('code');
            echo $this->Form->input('course_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
