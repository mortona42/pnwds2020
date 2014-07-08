<div<?php print $attributes; ?>>
  <div class="container" id="container">
    
    <div class="w-navigation">
      <?php if ($page['navigation']) : ?>
        <div class="l-navigation">
          <?php print render($page['navigation']); ?>
        </div>
      <?php endif; ?>
    </div>
    
    <div class="w-header">
      <header class="l-header" role="banner">
        <div class="l-branding">
          <?php if ($site_name || $site_slogan || $logo): ?>
            <div class="site--branding">
              <?php if ($logo) : ?>
                <a href="<?php print $front_page; ?>" class="site--branding__logo" title="<?php print t('Home'); ?>" rel="home">
                  <!--[if (lte IE 9)|(gt IEMobile 7)]>
                    <img src="<?php print $logo; ?>" onerror="this.onerror=null; this.src='/sites/all/themes/pnwds/logo.png'" alt="<?php print t('Home'); ?>" />
                  <![endif]-->
                  <?php include($logo); ?>
                </a>
              <?php endif; ?>

              <?php if ($site_name) : ?>
                <h1 class="site--branding__name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                </h1>
              <?php endif; ?>
              <?php if ($site_slogan) : ?>
                <h2 class="site--branding__slogan"><?php print $site_slogan; ?></h2>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php print render($page['branding']); ?>
        </div>
        
        <?php if ($page['menu']) : ?>
          <div class="l-menu">
            <?php print render($page['menu']); ?>
          </div>
        <?php endif; ?>

        <?php print render($page['header']); ?>
      </header>
    </div>

    <div class="w-highlighted">
      <?php if ($page['highlighted']) : ?>
      <div class="l-highlighted">
        <?php print render($page['highlighted']); ?>
      </div>
      <?php endif; ?>
    </div>

    <div class="w-main">
      <div class="l-main">
        
        <?php if ($page['preface']) : ?>
          <div class="l-preface">
            <?php print render($page['preface']); ?>
          </div>
        <?php endif; ?>
      
        <?php if ($page['sidebar_first']) : ?>
          <div class="l-sidebar-first">
            <?php print render($page['sidebar_first']); ?>
          </div>
        <?php endif; ?>
      
        <div class="l-content" role="main">
          <a id="main-content"></a>
          
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1 id="page--title" class="page--title"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          
          <?php print $messages; ?>
          
          <?php print render($tabs); ?>
          <?php print render($page['help']); ?>
          
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          
          <?php print render($page['content']); ?>
          <?php /* print $feed_icons; */ ?>
        </div>
        
        <?php if ($page['sidebar_second']) : ?>
          <div class="l-sidebar-second">
            <?php print render($page['sidebar_second']); ?>
          </div>
        <?php endif; ?>
        
        <?php if ($page['postscript']) : ?>
          <div class="l-postscript">
            <?php print render($page['postscript']); ?>
          </div>
        <?php endif; ?>
      
      </div>
    </div>

    <div class="w-footer">
      <footer class="l-footer" role="contentinfo">
        <?php print render($page['footer']); ?>
      </footer>
    </div>

  </div>
</div>

<div id="modal-container">
  <div class="modal">
    <h2 class="modal--title"></h2>
    <div class="modal--content"></div>
  </div>
</div>
