<!-- File: /app/View/Posts/add.ctp -->
<h1>Add Post</h1>
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
$options = array(
    'label' => 'Save Post',
    'class' => 'btn btn-primary',
);
echo $this->Form->end($options);
?>