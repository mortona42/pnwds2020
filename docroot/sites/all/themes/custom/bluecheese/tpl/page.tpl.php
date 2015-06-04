  <?php if ($drupalorg_site_status): ?>
  <div id="drupalorg-site-status"><?php print $drupalorg_site_status; ?></div>
  <?php endif; ?>
  <div id="header" class="clearfix">
    <div id="header-screen" class="clearfix">
      <div id="header-inner" class="container-12 clearfix">
        <div id="nav-header" role="navigation">
          <?php print render($page['navigation']); ?>
        </div> <!-- /#nav-header -->

        <div id="header-content">
          <div id="header-left">
            <div id="header-left-inner">
              <<?php print $site_name_element; ?> id="site-name"><?php print $drupalorg_logo_link; ?></<?php print $site_name_element; ?>>
              <?php print render($page['highlighted']); ?>
            </div> <!-- /#header-left-inner -->
          </div> <!-- /#header-left -->

          <div id="header-right">
            <div id="header-right-inner" role="search">
              <?php print render($page['header']); ?>
            </div> <!-- /#header-right-inner -->
          </div> <!-- /#header-right -->
        </div> <!-- /#header-content -->

        <div id="nav-masthead" role="navigation">
          <?php print $nav_masthead; ?>
        </div> <!-- /#nav-masthead -->
      </div> <!-- /#header-inner -->
    </div>
  </div> <!-- /#header -->

  <div id="page" class="container-12 clearfix">
    <div id="page-inner">

      <div id="page-heading">

        <?php if (!$is_front): ?>
          <div id="page-title-tools" class="clearfix" role="navigation">

            <div class="page-title-wrapper">
              <?php if (isset($section_name)) : ?>
                <?php if (!isset($matched_content_link)) : ?>
                  <div id="page-title" class="h2"><?php print $section_name; ?></div>
                <?php else: ?>
                  <h1 id="page-title" class="title"><?php print $section_name; ?></h1>
                <?php endif; ?>
              <?php else : ?>
                <?php if ($title): ?>
                  <h1 id="page-title" class="title"><?php print $title; ?></h1>
                <?php endif; // end if $title ?>
             <?php endif; ?>
            </div>

            <?php if (isset($page['page_tools'])): ?>
              <div id="page-tools"><?php print render($page['page_tools']); ?></div>
            <?php endif; ?>
          </div> <!-- /#page-title-tools -->

          <?php if ($nav_content): ?>
            <div id="nav-content">
              <?php print $nav_content; ?>
            </div> <!-- /#nav-content -->
          <?php endif; // end if $nav_content ?>

          <?php print $breadcrumb; ?>

          <?php if (isset($section_name) && !isset($matched_content_link)) : ?>
            <h1 id="page-subtitle"><?php print $title; ?></h1>
          <?php endif; ?>

        <?php endif; // end if $is_front ?>

      </div> <!-- /#page-heading -->

      <div id="main" role="main">
        <?php if ($tabs['#primary']): ?>
          <div id="tabs" class="clearfix">
            <?php print render($tabs); ?>
          </div> <!-- /#tabs -->
        <?php endif; // end if $tabs ?>

        <?php if ($page['content_top']): ?>
          <div id="content-top-region" class="clearfix">
            <?php print render($page['content_top']); ?>
          </div> <!-- /#content-top-region -->
        <?php endif; // end if $content_top ?>

        <div id="content" class="clearfix">
          <?php print $messages; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <div id="content-inner" class="clearfix"><?php print render($page['content']); ?></div>
          <?php if (!empty($feed_icons)): ?>
            <div id="feeds">Subscribe with RSS <?php print $feed_icons; ?></div>
          <?php endif; ?>
        </div> <!-- /#content -->

      </div> <!-- /#column-left -->

      <?php if ($page['sidebar_second']): ?>
        <div id="aside" role="complementary" >
          <div id="aside-region">
            <?php print render($page['sidebar_second']); ?>
          </div> <!-- /#column-right-region -->
        </div> <!-- /#column-right -->
      <?php endif; // end if $right ?>

      <?php if ($page['content_bottom']): ?>
        <div id="content-bottom-region" role="complementary" >
          <?php print render($page['content_bottom']); ?>
        </div> <!-- /#content-bottom -->
      <?php endif; // end if $content_bottom ?>
    </div> <!-- /#page-inner -->
  </div> <!-- /#page -->

  <div id="footer" role="contentinfo">
    <div id="footer-inner" class="container-12 clearfix">
      <?php if ($page['footer']): ?>
        <div id="footer-region">
          <div id="footer-region-inner" class="clearfix">
            <?php print render($page['footer']); ?>
          </div> <!-- /#footer-region-inner -->
        </div> <!-- /#footer-region -->
      <?php endif; // end if $nav_footer ?>
    </div> <!-- /#footer-inner -->
  </div> <!-- /#footer -->
