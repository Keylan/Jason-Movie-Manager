<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
use Cake\Core\Configure;

?>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __d('CakeDC/Users', 'Add User') ?></legend>
        <!--<div class="form-group">
            <label class="control-label">Username</label>
            <input name="username" class="form-control"  type="text" required>
        </div>

        <div class="form-group">
            <label class="control-label">Email</label>
            <input name="email" class="form-control"  type="text" required>
        </div>

        <div class="form-group">
            <label class="control-label">Password</label>
            <input name="password" class="form-control"  type="password" required>
        </div>

        <div class="form-group">
            <label class="control-label">Confirm Password</label>
            <input name="password_confirm" class="form-control"  type="password" required>
        </div>

        <div class="form-group">
            <label class="control-label">First Name</label>
            <input name="first_name" class="form-control"  type="text" required>
        </div>

        <div class="form-group">
            <label class="control-label">Last Name</label>
            <input name="last_name" class="form-control"  type="text" required>
        </div>-->
        <?php
        echo $this->Form->control('username', [
            'label' => __d('CakeDC/Users', 'Username'),
            'class' => 'form-control'
        ]);
        echo $this->Form->control('email', [
            'label' => __d('CakeDC/Users', 'Email'),
            'class' => 'form-control'
        ]);
        echo $this->Form->control('password', [
            'label' => __d('CakeDC/Users', 'Password'),
            'class' => 'form-control'
        ]);
        echo $this->Form->control('password_confirm', [
            'type' => 'password',
            'label' => __d('CakeDC/Users', 'Confirm password'),
            'class' => 'form-control'
        ]);
        echo $this->Form->control('first_name', [
            'label' => __d('CakeDC/Users', 'First name'),
            'class' => 'form-control']
        );
        echo $this->Form->control('last_name', [
            'label' => __d('CakeDC/Users', 'Last name'),
            'class' => 'form-control'
        ]);

        if (Configure::read('Users.Tos.required')) {
            echo $this->Form->control('tos', ['type' => 'checkbox', 'label' => __d('CakeDC/Users', 'Accept TOS conditions?'), 'required' => true]);
        }
        if (Configure::read('Users.reCaptcha.registration')) {
            echo $this->User->addReCaptcha();
        }
        ?>
    </fieldset>
    <?= $this->Form->button(__d('CakeDC/Users', 'Submit')) ?>
    <?= $this->Form->end() ?>
</div>
