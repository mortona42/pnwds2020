<?php
// $Id: widget.tpl.php,v 1.1.2.14 2010/12/21 03:11:10 realityloop Exp $

/**
 * @file
 * widget.tpl.php
 *
 * groups widget theme for Vote Up/Down
 */
?>
<div class="vud-widget vud-widget-groups" id="<?php print $id; ?>">
  <div class="groups-score">
    <span class="groups-current-score"><?php print $unsigned_points; ?></span>
    <?php print $vote_label; ?>
  </div>
  <?php if ($show_links): ?>
  <div class="groups-voters" id="<?php print $id; ?>">
    <a href="<?php print $link_up; ?>" rel="nofollow" class="<?php print $link_class_up; ?>">
      <span class="<?php print $class_up; ?>" title="<?php print t('Vote up!'); ?>"></span>
      <div class="element-invisible"><?php print t('Vote up!'); ?></div>
    </a>
    <a href="<?php print $link_down; ?>" rel="nofollow" class="<?php print $link_class_down; ?>">
      <span class="<?php print $class_down; ?>" title="<?php print t('Vote down!'); ?>"></span>
      <div class="element-invisible"><?php print t('Vote down!'); ?></div>
    </a>
  </div>
  <?php endif; ?>
</div>