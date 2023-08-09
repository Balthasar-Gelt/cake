<?php
/**
 * @var \App\View\AppView                 $this
 * @var iterable<\App\Model\Entity\Image> $images
 */
?>

<?= $this->Form->create(null, [
    'url' => [
        'controller' => 'Images',
        'action' => 'index'
    ]
]); ?>
<?= $this->Form->control('search', ['type' => 'text', 'label' => false]); ?>
<?= $this->Form->end(); ?>

<div class="images index content">
    <?= $this->Html->link(__('New Image'), ['action' => 'add'], ['class' => 'button float-right']); ?>
    <h3><?= __('Images'); ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id'); ?></th>
                    <th><?= __('Image'); ?></th>
                    <th><?= $this->Paginator->sort('name'); ?></th>
                    <th class="actions"><?= __('Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image) { ?>
                <tr>
                    <td><?= $this->Number->format($image->id); ?></td>
                    <td><img src="/cake/img/<?= h($image->name); ?>" alt="<?= h($image->name); ?>"></td>
                    <td><?= h($image->name); ?></td>
                    <td class="actions">
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]); ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')); ?>
            <?= $this->Paginator->prev('< ' . __('previous')); ?>
            <?= $this->Paginator->numbers(); ?>
            <?= $this->Paginator->next(__('next') . ' >'); ?>
            <?= $this->Paginator->last(__('last') . ' >>'); ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')); ?></p>
    </div>
</div>
