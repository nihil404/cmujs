<?php if(isset($post)): ?>
    <h2><?php echo $post->title; ?></h2>
    <small class="post-date">Posted On: <?php echo $post->created_at; ?></small><br>
    <div class="post-body">
        <?php echo $post->body; ?>    
    </div>
<?php endif; ?>
