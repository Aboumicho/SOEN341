<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Temp'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="temps index large-9 medium-8 columns content">
    <h3><?= __('Temps') ?></h3>
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
            <?php foreach ($temps as $temp): ?>
            <tr>
                <td><?= $this->Number->format($temp->id) ?></td>
                <td><?= h($temp->name) ?></td>
                <td><?= h($temp->day) ?></td>
                <td><?= h($temp->type) ?></td>
                <td><?= h($temp->start) ?></td>
                <td><?= h($temp->end) ?></td>
                <td><?= h($temp->code) ?></td>
                <td><?= $this->Number->format($temp->course_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $temp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $temp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $temp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $temp->id)]) ?>
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
