<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Klass'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="klasses index large-9 medium-8 columns content">
    <h3><?= __('Klasses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($klasses as $klass): ?>
            <tr>
                <td><?= $this->Number->format($klass->id) ?></td>
                <td><?= h($klass->name) ?></td>
                <td><?= h($klass->day) ?></td>
                <td><?= h($klass->type) ?></td>
                <td><?= h($klass->start) ?></td>
                <td><?= h($klass->end) ?></td>
                <td><?= h($klass->code) ?></td>
                <td><?= $klass->has('course') ? $this->Html->link($klass->course->name, ['controller' => 'Courses', 'action' => 'view', $klass->course->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $klass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $klass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $klass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $klass->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
