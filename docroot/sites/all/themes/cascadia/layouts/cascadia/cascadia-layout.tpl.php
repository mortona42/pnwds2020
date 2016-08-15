<div class="l-page-wrapper"><div<?php print $attributes; ?>>
    <header class="l-header" role="banner">

      <div id ="top" class="l-navigation">
        <div class="menu-nav">
          <a class="nav-btn" id="nav-open-btn" href="#block-<?php if (isset($event)) { print 'menu-menu-' . $event; } else { print 'system-main-menu'; } ?>">Main Menu</a>
          <a class="user-btn" id="user-open-btn" href="#block-system-user-menu">User Menu</a>
        </div>
        <div class="l-constrained">

          <?php print render($page['navigation']); ?>

        </div>
      </div>
      <div class="l-header-inner">
        <div class="l-branding site-branding">
          <?php if ($logo): ?>
            <a href="<?php if (isset($event)) { print '/' . $event; } else { print '/'; } ?>" title="<?php print t('Home'); ?>" rel="home" class="site-branding__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
          <?php endif; ?>
          <?php print render($page['branding']); ?>
        </div>
        <?php print render($page['header']); ?>
      </div>
    </header>

    <?php if (!empty($page['highlighted'])): ?>
      <div class="l-highlighted-wrapper">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>

    <div class="l-main-wrapper">
      <div class="l-main l-constrained">
        <a id="main-content"></a>
        <div class="administrative">
          <?php print render($tabs); ?>
        </div>

        <div class="l-content" role="main">
          <?php if (!isset($node) || (isset($node) && $node->type != 'event') && (isset($node) && $node->type != 'session') && (isset($node) && $node->type != 'schedule_item') && (isset($node) && $node->type != 'bof')): ?>
            <?php print render($page['preface']); ?>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <div class="title-region"><h1 class="page-title"><?php print $title; ?></h1></div>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
          <?php endif; ?>
          <?php print $messages; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </div>

        <?php print render($page['sidebar']); ?>
      </div>
    </div>

    <?php if (!empty($page['epilogue'])): ?>
      <footer class="l-epilogue-wrapper" role="contentinfo">
        <?php print render($page['epilogue']); ?>
      </footer>
    <?php endif; ?>

    <?php if (!empty($page['errata'])): ?>
      <footer class="l-errata-wrapper" role="contentinfo">
        <?php print render($page['errata']); ?>
      </footer>
    <?php endif; ?>

    <?php if (!empty($page['footer'])): ?>
      <footer class="l-footer-wrapper" role="contentinfo">
        <?php print render($page['footer']); ?>
      </footer>
    <?php endif; ?>
  </div></div>
