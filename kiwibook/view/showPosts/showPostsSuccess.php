<?php foreach ($context->posts as $post) { ?>
    <div id="post">
        <img id="image" src=<?php echo $post->image ?>>
        <p id="text"><?php echo $post->text ?></p>
        <p id="date"><?php echo $post->date ?></p>
    </div>
<?php } ?>