<h1 class="page-header">
Blog
</h1>
<?php foreach ($posts as $post): ?>
                <h2>
                    <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
                </h2>
                <p class="lead">by <?php echo h($post['Post']['autor']); ?>
<img src="
<?php
foreach ($usersAva as $ava){
    if(($ava["user_id"])===($post['Post']['user_id'])){
        echo $ava['image_url'];
    ?>
<?php
}
}?>
"class='img-circle' style='width: 64px; height: 64px;'>
</p>
                <p> Posted on <?php echo $post['Post']['created']; ?></p>
                <p style="height:60px;overflow:hidden"> <?php echo h($post['Post']['body']); ?></p>
<?php
 if(($post['Post']['user_id'])==($this->Session->read('Auth.User.id'))){
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $post['Post']['id']),
                            array('class' => 'btn btn-primary'),
                            array('confirm' => 'Are you sure?')
                        );
                    ?>&nbsp;<?php
                        echo $this->Html->link(
                        'Edit', array('action' => 'edit', $post['Post']['id']),
                                array('class' => 'btn btn-primary')
                                );
                    ?><hr><?php
 }else{
 ?><hr><?php
 }
?>
                <?php endforeach; ?>
