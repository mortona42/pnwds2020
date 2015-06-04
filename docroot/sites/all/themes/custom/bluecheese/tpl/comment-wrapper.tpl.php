<?php

// Render the comments and form first to see if we need headings.
$comments = render($content['comments']);
?>
<section class="comments <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ($content['comments']): ?>
    <?php print render($title_prefix); ?>
    <h2 class="title"><?php print t('Comments'); ?></h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>

  <?php print $comments; ?>

  <?php if ($content['comment_form']): ?>
    <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
    <?php print render($content['comment_form']); ?>
  <?php endif; ?>
</section>
