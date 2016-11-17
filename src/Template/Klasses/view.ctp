<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Klass'), ['action' => 'edit', $klass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Klass'), ['action' => 'delete', $klass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $klass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Klasses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Klass'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="klasses view large-9 medium-8 columns content">
    <h3><?= h($klass->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($klass->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= h($klass->day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($klass->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($klass->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $klass->has('course') ? $this->Html->link($klass->course->name, ['controller' => 'Courses', 'action' => 'view', $klass->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($klass->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($klass->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($klass->end) ?></td>
        </tr>
    </table>
</div>
