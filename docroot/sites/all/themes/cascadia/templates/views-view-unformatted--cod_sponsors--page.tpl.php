<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
<div class="<?php print strtolower($title); ?>">
  <div class="level-inner">
  <h2><?php print $title; ?></h2><!--this is the group name-->
  <div class="sponsors">
    <?php foreach ($rows as $id => $row): ?>
      <div class="<?php print $classes_array[$id]; ?>">
        <?php print $row; ?>
      </div>
    <?php endforeach; ?>
    </div>
  </div><!--end your div-->
</div>
<?php endif; ?>
