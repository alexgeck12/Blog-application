<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('username',array('label' => 'Username','div' => 'well','class'=>'form-control'));
        echo $this->Form->input('password',array('label' => 'Password','div' => 'well','class'=>'form-control'));
        echo $this->Form->input('avatar',array('type' => 'file','div' => 'well','class'=>'form-control'));
        ?></br><?php
    ?>
    </fieldset>
<?php
$options = array(
    'label' => 'Submit',
    'class' => 'btn btn-primary',
);
echo $this->Form->end($options);?>
</div>