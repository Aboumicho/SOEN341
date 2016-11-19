<div class="related">
        <h4><?= __('Related Klasses') ?></h4>
        <?php if (!empty($c->klasses)): ?>
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
            <?php foreach ($c as $klasses): ?>
            <tr>
                <td><?= h($c->id) ?></td>
                <td><?= h($c->name) ?></td>
                <td><?= h($c->day) ?></td>
                <td><?= h($c->type) ?></td>
                <td><?= h($c->start) ?></td>
                <td><?= h($c->end) ?></td>
                <td><?= h($c->code) ?></td>
                <td><?= h($c->course_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Klasses', 'action' => 'view', $klasses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Klasses', 'action' => 'edit', $klasses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Klasses', 'action' => 'delete', $klasses->id], ['confirm' => __('Are you sure you wants to delete # {0}?', $klasses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>