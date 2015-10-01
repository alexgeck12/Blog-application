<!-- File: /app/View/Posts/edit.ctp -->
<h1>Edit Post</h1><hr>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('title',array('label' => 'Title',
                                      'div' => 'well',
                                      'class'=>'form-control'
                                      ));
echo $this->Form->input('body', array('rows' => '3',
                                      'label' => 'Body',
                                      'div' => 'well',
                                      'class'=>'form-control'));
echo $this->Form->input('id', array('type' => 'hidden'));

$options = array(
    'label' => 'Save Post',
    'class' => 'btn btn-primary',
);
echo $this->Form->end($options);
?>