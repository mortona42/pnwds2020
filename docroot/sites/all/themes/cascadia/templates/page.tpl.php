<div class="l-page-wrapper"><div<?php print $attributes; ?>>

  <header class="l-header-wrapper" role="banner">
    <div class="l-header">
      <div class="l-branding site-branding">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-branding__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
        <?php endif; ?>
        <?php if (!$logo && $site_name): ?>
          <a href="<?php print $front_page; ?>" class="site-branding__name" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <h2 class="site-branding__slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </div>
      <div class="l-header-content header-content">
        <?php print render($page['header']); ?>
      </div>
    </div>
    <div class="l-navigation">
      <?php print render($page['navigation']); ?>
    </div>
  </header>

  <?php print render($page['hero']); ?>

  <?php if (!empty($page['highlighted'])): ?>
    <div class="l-highlighted-wrapper">
      <?php print render($page['highlighted']); ?>
    </div>
  <?php endif; ?>

  <div class="l-main-wrapper">
    <div class="l-main">
      <a id="main-content"></a>

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
        <?php print render($tabs); ?>
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
