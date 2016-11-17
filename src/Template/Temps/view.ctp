<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Temp'), ['action' => 'edit', $temp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Temp'), ['action' => 'delete', $temp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $temp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Temps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Temp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="temps view large-9 medium-8 columns content">
    <h3><?= h($temp->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($temp->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= h($temp->day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($temp->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($temp->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($temp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course Id') ?></th>
            <td><?= $this->Number->format($temp->course_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($temp->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($temp->end) ?></td>
        </tr>
    </table>
</div>
