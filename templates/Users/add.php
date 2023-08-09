<?php
/**
 * @var \App\View\AppView      $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions'); ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']); ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user); ?>
            <fieldset>
                <legend><?= __('Register User'); ?></legend>
                <?php
                    echo $this->Form->control('login', ['required' => true]);
echo $this->Form->control('password', ['required' => true]);
echo $this->Form->control('confirm_password', ['type' => 'password', 'required' => true]);
?>
            </fieldset>
            <?= $this->Form->button(__('Submit')); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
