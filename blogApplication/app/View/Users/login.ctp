<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username',array('label' => 'Username',
                                                                                      'div' => 'well',
                                                                                      'class'=>'form-control'
                                                                                      ));
        echo $this->Form->input('password',array('label' => 'Password',
                                                                                'div' => 'well',
                                                                                'class'=>'form-control'
                                                                                ));
    ?>
    </fieldset>
<?php
$options = array(
    'label' => 'Login',
    'class' => 'btn btn-primary',
);
echo $this->Form->end($options);?>
</div>