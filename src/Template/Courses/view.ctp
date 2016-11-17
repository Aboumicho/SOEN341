<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Klasses'), ['controller' => 'Klasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Klass'), ['controller' => 'Klasses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?= h($course->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($course->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($course->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credits') ?></th>
            <td><?= $this->Number->format($course->credits) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Klasses') ?></h4>
        <?php if (!empty($course->klasses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Day') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Start') ?></th>
                <th scope="col"><?= __('End') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($course->klasses as $klasses): ?>
            <tr>
                <td><?= h($klasses->id) ?></td>
                <td><?= h($klasses->name) ?></td>
                <td><?= h($klasses->day) ?></td>
                <td><?= h($klasses->type) ?></td>
                <td><?= h($klasses->start) ?></td>
                <td><?= h($klasses->end) ?></td>
                <td><?= h($klasses->code) ?></td>
                <td><?= h($klasses->course_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Klasses', 'action' => 'view', $klasses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Klasses', 'action' => 'edit', $klasses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Klasses', 'action' => 'delete', $klasses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $klasses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
