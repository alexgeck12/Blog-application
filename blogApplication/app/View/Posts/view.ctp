<!-- File: /app/View/Posts/view.ctp -->
<h1><?php echo h($post['Post']['title']); ?></h1>
<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
<?php if(!empty($post['Post']['modified']))?>
<p><small>Modified: <?php echo $post['Post']['modified']; ?></small></p>
<p class="lead">by <?php echo h($post['Post']['autor']); ?></p>
<p><?php echo h($post['Post']['body']); ?></p>