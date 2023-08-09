<div class="users form">
    <?= $this->Flash->render(); ?>
    <h3>Login</h3>
    <?= $this->Form->create(); ?>
    <fieldset>
        <legend><?= __('Please enter your login and password'); ?></legend>
        <?= $this->Form->control('login', ['required' => true]); ?>
        <?= $this->Form->control('password', ['required' => true]); ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end(); ?>

    <?= $this->Html->link('Register', ['action' => 'add']); ?>
</div>