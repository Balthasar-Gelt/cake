<?php
/**
 * @var \App\View\AppView       $this
 * @var \App\Model\Entity\Image $image
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions'); ?></h4>
            <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'side-nav-item']); ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="images form content">
            <?= $this->Form->create($image, ['enctype' => 'multipart/form-data']); ?>
            <fieldset>
                <legend><?= __('Add Image'); ?></legend>
                <?php
                    echo $this->Form->control('name', ['type' => 'file']);
echo $this->Form->control('x_axis', ['type' => 'number', 'label' => 'left']);
echo $this->Form->control('y_axis', ['type' => 'number', 'label' => 'top']);
echo $this->Form->control('width', ['type' => 'number']);
echo $this->Form->control('height', ['type' => 'number']);
?>
            </fieldset>
            <?= $this->Form->button(__('Submit')); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
